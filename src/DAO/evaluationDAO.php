<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:43
 */

namespace ppe_project_gestion\DAO;

use Doctrine\DBAL\Connection;
use ppe_project_gestion\Domain\Evaluation;


class EvaluationDAO extends DAO
{

    private $db;

    public function __construct(Connection $_db)
    {
        $this->db = $_db;
    }

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

    private function buildEvaluation(array $row)
    {
        $evaluation = new \ppe_project_gestion\Domain\evaluation\Evaluation();
        $evaluation->setGradeStudent(['grade_student']);
        $evaluation->setCoefDiscipline(['grade_coef']);
        $evaluation->setJudgement(['judgment_student']);
        $evaluation->setDtCreate(getdate());
        $evaluation->setDtUpdate(getdate());
        $evaluation->setIdStudent(['student_id']);

        return $evaluation;
    }

}