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
    private $studentDAO;
    private $disciplineDAO;

    /**
     * @param StudentDAO $studentDAO
     *
     * Fait une dépendance entre la classe studentDao et evaluation
     */
    public function setStudentDAO(StudentDAO $studentDAO)
    {
        $this->studentDAO = $studentDAO;
    }

    /**
     * @param DisciplineDAO $disciplineDAO
     *
     * Fait une dépendance entre la classe disciplineDAO et evaluation
     */
    public function setDisciplineDAO(DisciplineDAO $disciplineDAO)
    {
        $this->disciplineDAO = $disciplineDAO;
    }

    /**
     * @param $studentId
     * @return array
     *
     * Fonction de recherche par étudiant (Filtre)
     * On va rechercher toutes les notes d'un étudiant
     * Fonctionne
     */
    public function findAllByStudent($studentId)
    {
        $student = $this->studentDAO->findStudent($studentId);

        $sql = "SELECT id_student, grade_student, judgement FROM evaluation WHERE id_student = ?";
        $res = $this->getDb()->fetchAll($sql, array($studentId));


        $notes = array();
        foreach($res as $row)
        {
            $noteID = $row['id_evaluation'];
            $note = $this->buildDomainObject($row);

            $note->setStudent($student);
            $notes[$noteID] = $note;
        }
        return $notes;
    }

    /**
     * //   FIND ALL
     */
    public function findAll()
    {
        $sql = "SELECT * FROM evaluation ";
        $res = $this->getDb()->fetchAll($sql);

        $matieres = array();
        foreach($res as $row)
        {
            $matiereID = $row['id_evaluation'];
            $matieres[$matiereId] = $this->buildDomainObject($row);
        }
        return $matieres;   
    }

    /**
     * @param $id
     * @return Evaluation
     * @throws \Exception
     *
     * Recherche d'une note par l'id
     */
    public function find($id)
    {
        $sql = "SELECT * FROM evaluation WHERE id_evaluation=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new \Exception("Aucune note pour l'id : " . $id);
        }
    }

    /**
     * @param Evaluation $evaluation
     * Sauvegarde et modification d'une note pour l'élève
     */
    public function saveGrade(Evaluation $evaluation)
    {
        $grade = array(
            'id_student'        => $evaluation->getIdStudent(),
            'id_discipline'     => $evaluation->getDiscipline(),
            'grade_student'     => $evaluation->getGradeStudent(),
            'coef_discipline'   => $evaluation->getCoefDiscipline(),
            'judgement'         => $evaluation->getJudgement(),
            'dt_create'        => $evaluation->getDtCreate(),
            'dt_update'        => $evaluation->getDtUpdate()
        );

        if($evaluation->getIdEvaluation())
        {
            $this->getDb()->update('evaluation', $grade, array('id_evaluation'=> $evaluation->getIdEvaluation()));
        }
        else{
            $this->getDb()->insert('evaluation', $grade);
            $_id_evaluation = $this->getDb()->lastInsertId();
            $evaluation->setIdEvaluation($_id_evaluation);
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

    /**
     * @param $row
     * @return Evaluation
     * création de l'objet evaluation représentant la note et l'appréciation de l'élève
     */
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
            $student = $this->studentDAO->findStudent($studentID);
            $evaluation->setStudent($student);
        }

        if(array_key_exists('id_discipline', $row))
        {
            $disciplineID = $row['id_discipline'];
            $discipline = $this->disciplineDAO->findDiscipline($disciplineID);
            $evaluation->setDiscipline($discipline);
        }

        return $evaluation;
    }

}
