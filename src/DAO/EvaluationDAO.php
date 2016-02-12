<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:43
 */

namespace ppe_project_gestion\DAO;


use ppe_project_gestion\Domain\Evaluation;


class EvaluationDAO extends DAO
{

    //affiche toutes les évaluations de l'élève.
    public function findAll()
    {
        $_sql = "SELECT * FROM evaluation ORDER BY id_evaluation";
        $_res = $this->getDb()->fetchAll($_sql);

        $_notes = array();
        foreach($_res as $row){
            $_noteId = $row['id_evaluation'];
            $_note[$_noteId] = $this->buildDomainObject($row);
        }

        return $_notes;
    }

    //crée l'objet evaluation représentant la note de l'appréciation de l'élève
    protected function buildDomainObject($row)
    {
        $evaluation = new \ppe_project_gestion\Domain\evaluation\Evaluation();
        $evaluation->setIdEvaluation($row['id_evaluation']);
        $evaluation->setGradeStudent($row['grade_student']);
        $evaluation->setCoefDiscipline($row['coef_discipline']);
        $evaluation->setJudgement($row['judgement']);
        $evaluation->setDtCreate($row['dt_create']);
        $evaluation->setDtUpdate($row['dt_update']);
        $evaluation->setIdStudent($row['id_student']);
        $evaluation->setIdDiscipline($row['id_discipline']);

        return $evaluation;
    }

}
