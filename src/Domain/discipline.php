<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:14
 *
 * Class avec les getters et setters pour les matières
 */
class Discipline
{
    private $id_discipline;
    private $name_discipline;
    private $id_evaluation; /*clé étrangère*/

    private $dt_create;
    private $dt_update;

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }
    public function getNameDiscipline()
    {
        return $this->name_discipline;
    }

    public function setNameDiscipline($_name_discipline)
    {
        $this->name_discipline = $_name_discipline;
    }

    public function getIdEvaluation()
    {
        return $this->id_evaluation;
    }

    public function setIdEvaluation(_$id_evaluation)
    {
        $this->id_evaluation = $_id_evaluation;
    }

    public function getDtCreate()
    {
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }

    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
    }
}