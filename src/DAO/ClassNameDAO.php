<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 */

namespace ppe_project_gestion\DAO;

use Doctrine\DBAL\Connection;
use ppe_project_gestion\Domain\ClassName;


class ClassNameDAO extends DAO
{
    private $db;

    public function __construct($_db)
    {
        $this->db = $_db;
    }

    //Fonction qui retourne toutes les classes
    public function findAll()
    {
        $_sql = "SELECT * FROM className ORDER BY class_name";

        $_res = $this->getDb()->fetchAll($_sql);

        $_classNames = array();
        foreach($_res as $row){
            $_classNameId = $row['id_className'];
            $_className[$_classNameId] = $this->buildDomainObject($row);
        }

        return $_classNames;
    }

    private function buildClassName(array $row)
    {
        $class = new ClassName();
        $class->setClassName['class_name'];

        return $class;
    }


}
