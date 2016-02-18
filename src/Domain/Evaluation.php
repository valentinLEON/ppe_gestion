<?php

namespace ppe_gestion\Domain;
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:30
 *
 * Getters et setters des évaluations, regroupant les notes
 * et les appréciations
 */
class Evaluation
{
    public $id_evaluation;
    public $grade_student;
    public $judgement;
    public $coef_discipline;

    public $dt_create;
    public $dt_update;

    public $id_student; /*clé étrangère*/
    public $id_discipline; /*clé étrangère*/

    public function getIdEvaluation(){
        return $this->id_evaluation;
    }

    public function setIdEvaluation($_id_evaluation)
    {
        $this->id_evaluation = $_id_evaluation;
    }

    public function getIdStudent(){
        return $this->id_student;
    }

    public function setIdStudent($_id_student)
    {
        $this->id_student = $_id_student;
    }

    public function getGradeStudent(){
        return $this->grade_student;
    }

    public function setGradeStudent($_grade_student)
    {
        $this->grade_student = $_grade_student;
    }

    public function getCoefDiscipline()
    {
        return $this->coef_discipline;
    }

    public function setCoefDiscipline($_coef_discipline)
    {
        $this->coef_discipline = $_coef_discipline;
    }

    public function getJudgement(){
        return $this->judgement;
    }

    public function setJudgement($_judgement)
    {
        $this->judgement = $_judgement;
    }

    public function getDtCreate(){
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }

    public function getDtUpdate(){
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
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
