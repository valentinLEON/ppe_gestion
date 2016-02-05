<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:30
 */
class grade
{
    private $id_grade;
    private $id_student;
    private $id_user;

    private $grade_student;
    private $judgement;

    private $dtCreate;
    private $dtUpdate;

    public function getIdGrade(){
        return $this->id_grade;
    }

    public function getIdStudent(){
        return $this->id_student;
    }

    public function getIdUser(){
        return $this->id_user;
    }

    public function getGradeStudent(){
        return $this->grade_student;
    }

    public function getJudgement(){
        return $this->judgement;
    }

    public function getDtCreate(){
        return $this->dtCreate;
    }

    public function getDtUpdate(){
        return $this->dtUpdate;
    }




}