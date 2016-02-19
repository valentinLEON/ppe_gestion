<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:43
 */

namespace ppe_gestion\DAO;


use ppe_gestion\Domain\Evaluation;



class EvaluationDAO extends DAO
{
    public $studentDAO;
    public $disciplineDAO;

    /**
     * @param StudentDAO $_studentDAO
     *
     * Fait une dépendance entre la classe studentDao et evaluation
     */
    public function setStudentDAO(StudentDAO $_studentDAO)
    {
        $this->studentDAO = $_studentDAO;
    }

    /**
     * @param DisciplineDAO $_disciplineDAO
     *
     * Fait une dépendance entre la classe disciplineDAO et evaluation
     */
    public function setDisciplineDAO(DisciplineDAO $_disciplineDAO)
    {
        $this->disciplineDAO = $_disciplineDAO;
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

    //ajout note par éleve
    public function saveGrade(Evaluation $_evaluation)
    {
        $grade = array(
            'id_student'=> $_evaluation->getStudent()->getIdEvaluation(),
            'id_discipline'=> $_evaluation->getDiscipline()->getIdEvaluation(),
            'grade_student'=> $_evaluation->getGradeStudent(),
            'coef_discipline'=> $_evaluation->getCoefDiscipline(),
            'judgement'=> $_evaluation->getJudgement()
        );

        if($_evaluation = getIdEvaluation())
        {
            $this->getDb()->update('evaluation', $grade, array('id_evaluation'=> $_evaluation->getIdEvaluation()));
        }
        else{
            $this->getDb()->insert('evaluation', $grade);
            $_id_evaluation = $this->getDb()->lastInsertId();
            $_evaluation->setIdEvaluation($_id_evaluation);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * Suppression d'une note
     */
    public function deleteGrade($id)
    {
        $this->getDb()->delete('evaluation', array(
            'id_evaluation' => $id
        ));
    }

    //crée l'objet evaluation représentant la note de l'appréciation de l'élève
    protected function buildDomainObject($row)
    {
        $evaluation = new Evaluation();

        $evaluation->setIdEvaluation($row['id_evaluation']);
        $evaluation->setGradeStudent($row['grade_student']);
        $evaluation->setCoefDiscipline($row['coef_discipline']);
        $evaluation->setJudgement($row['judgement']);
        $evaluation->setDtCreate($row['dt_create']);
        $evaluation->setDtUpdate($row['dt_update']);

        if(array_key_exists('id_student', $row))
        {
            $studentID = $row['id_student'];
            $student = $this->studentDAO->find($studentID);
            $evaluation->setStudent($student);
        }

        if(array_key_exists('id_discipline', $row))
        {
            $disciplineID = $row['id_discipline'];
            $discipline = $this->disciplineDAO->find($disciplineID);
            $evaluation->setDiscipline($discipline);
        }

        return $evaluation;
    }

}
