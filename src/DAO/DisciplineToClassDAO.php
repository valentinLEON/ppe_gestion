<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 11:42
 */

namespace ppe_project_gestion\DAO;

use ppe_project_gestion\Domain\DisciplineToClass;

class DisciplineToClassDAO
{

    protected function BuildDomainObject($row)
    {
        $disciplineToClass = new \DisciplineToClass();
        $disciplineToClass->setIdClassName($row['id_className']);
        $disciplineToClass->setIdDiscipline($row['id_discipline']);

        return $disciplineToClass;
    }

}