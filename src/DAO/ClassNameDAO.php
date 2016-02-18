<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 k*/

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\ClassName;


class ClassNameDAO extends DAO
{

    //Fonction qui retourne toutes les classes
    public function findAll()
    {
        $_sql = "SELECT * FROM className ORDER BY class_name";

        $_res = $this->getDb()->fetchAll($_sql);

        $classNames = array();
        foreach($_res as $row){
            $_classNameId = $row['id_class'];
            $_className[$_classNameId] = $this->buildDomainObject($row);
        }

        return $classNames;
    }

    /**
     * @param $row
     * @return \ppe_project_gestion\Domain\className\ClassName
     */
    protected function buildDomainObject($row)
    {
        $class = new ClassName();
        $class->setIdClassName($row['id_class']);
        $class->setClassName($row['class_name']);
        $class->setClassOption($row['class_option']);
        $class->setClassYear($row['class_year']);
        $class->setDtCreate($row['dt_create']);
        $class->setDtUpdate($row['dt_update']);

        return $class;
    }


}
