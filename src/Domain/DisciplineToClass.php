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
    private $id_className;
    private $id_discipline;

    public function getIdClassName()
    {
        return $this->id_className;
    }

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

}
