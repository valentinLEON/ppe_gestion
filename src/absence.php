<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/02/2016
 * Time: 00:15
 */
class absence
{
    private $id_grade;
    private $id_student;
    private $id_discipline;
    private $nbrAbs;
    private $dateAbs;
    private $late;
    private $judgmentAbs;
    private $dtCreate;
    private $dtUpdate;

    public function getIdGrade()
    {
        return $this->id_grade;
    }

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function getNbrAbs()
    {
        return $this->nbrAbs;
    }

    public function getDateAbs()
    {
        return $this->dateAbs;
    }

    public function getLate()
    {
        return $this->late;
    }

    public function getJudgmentAbs()
    {
        return $this->judgmentAbs;
    }

    public function getDtCreate()
    {
        return $this->dtCreate;
    }

    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }



}