<?php

/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 14:22
 *
 * Association des classes Class et Discipline (matières)
 */
class DisciplineToClass
{
    public $id_className;
    public $id_discipline;

    public function getIdClassName()
    {
        return $this->id_className;
    }

    public function setIdClassName($_id_className)
    {
        $this->id_className = $_id_className;
    }

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function setIdDiscipline($_id_discipline)
    {
        $this->id_discipline = $_id_discipline;
    }

}
