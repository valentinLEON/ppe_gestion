<?php

/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 14:22
 *
 * Table d'association des classes ClassName et Discipline (matières)
 */
class DisciplineToClass
{
    public $id_className;
    public $id_discipline;

    //region Getter et Setter de la clé étrangère de id_className
    public function getIdClassName()
    {
        return $this->id_className;
    }

    public function setIdClassName($_id_className)
    {
        $this->id_className = $_id_className;
    }
    //endregion

    //region Getter et Stter de la clé étrangère de id_discipline
    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function setIdDiscipline($_id_discipline)
    {
        $this->id_discipline = $_id_discipline;
    }
    //endregion

}
