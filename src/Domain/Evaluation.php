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

    public $student;
    public $discipline;

    public $dt_create;
    public $dt_update;

    //region Getter et Setter de l'ID de l'évaluation
    public function getIdEvaluation(){
        return $this->id_evaluation;
    }

    public function setIdEvaluation($_id_evaluation)
    {
        $this->id_evaluation = $_id_evaluation;
    }
    //endregion

    //region Getter et Setter de la note de l'évaluation a l'élève
    public function getGradeStudent(){
        return $this->grade_student;
    }

    public function setGradeStudent($_grade_student)
    {
        $this->grade_student = $_grade_student;
    }
    //endregion

    //region Getter et Setter du coefficient de l'évaluation
    public function getCoefDiscipline()
    {
        return $this->coef_discipline;
    }

    public function setCoefDiscipline($_coef_discipline)
    {
        $this->coef_discipline = $_coef_discipline;
    }
    //endregion

    //region Getter et Setter de l'appréciation de l'évaluation
    public function getJudgement(){
        return $this->judgement;
    }

    public function setJudgement($_judgement)
    {
        $this->judgement = $_judgement;
    }
    //endregion

    //region Getter et Setter de l'objet Etudiant
    public function getStudent()
    {
        return $this->student;
    }

    // voir pour les clef etrangeres aussi
    public function setStudent($student)
    {
        $this->student = $student;
    }
    //endregion

    //region Getter et Setter de l'objet Matière
    public function getDiscipline()
    {
        return $this->discipline;
    }
   // voir pour les clef etrangeres aussi
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }
    //endregion

    //region Getter et Setter de la date de création de la note
    public function getDtCreate(){
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }
    //endregion

    //region Getter et Setter de la date de modification d'une des notes
    public function getDtUpdate(){
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
    }
    //endregion


}
