<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:14
 *
 * TODO: Peut-être à modifier si le MCD n'est pas bon
 */
class discipline
{
    private $id_discipline;
    private $discipline_name;
    private $id_grade;
    private $id_class;

    private $dtCreate;
    private $dtUpdate;

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }
    public function getDisciplineName()
    {
        return $this->discipline_name;
    }
    public function getIdGrade()
    {
        return $this->id_grade;
    }
    public function getIdClass()
    {
        return $this->id_class;
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