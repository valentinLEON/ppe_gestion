<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 11:43
 */

namespace ppe_project_gestion\DAO;

use ppe_project_gestion\Domain\StudentToClass;

class StudentToClassDAO
{
    protected function buildDomainObject($row)
    {
        $studentToClass = new \StudentToClass();
        $studentToClass->setIdClassName($row['id_className']);
        $studentToClass->setIdStudent($row['id_student']);

        return $studentToClass;
    }

}