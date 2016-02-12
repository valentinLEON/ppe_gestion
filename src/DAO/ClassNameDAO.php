<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 k*/

namespace ppe_project_gestion\DAO;

use ppe_project_gestion\Domain\ClassName;


class ClassNameDAO extends DAO
{

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

    protected function buildDomainObject($row)
    {
        $class = new \ppe_project_gestion\Domain\className\ClassName();
        $class->setIdClassName($row['id_className']);
        $class->setClassName($row['class_name']);
        $class->setClassOption($row['class_option']);
        $class->setClassYear($row['class_year']);
        $class->setDtCreate(getdate());
        $class->setDtUpdate(getdate());
        $class->setIdStudent($row['id_student_className']);

        return $class;
    }


}
