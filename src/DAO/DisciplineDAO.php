<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 */

namespace ppe_gestion\DAO;

use Silex\Application;
use ppe_gestion\Domain\Discipline;
use ppe_gestion\DAO\EvaluationDAO;


class DisciplineDAO extends DAO
{

    public $evaluationDAO;

    /**
     * @param EvaluationDAO $_evaluationDAO
     * Dépendance avec les notes
     */
    public function setEvaluationDAO(EvaluationDAO $_evaluationDAO)
    {
        $this->evaluationDAO = $_evaluationDAO;
    }

    /**
     * @return array
     *
     * Recherche et affiche toutes les matières
     */
    public function findAll()
    {
        $_sql = "SELECT * FROM discipline ORDER BY name_discipline ASC";
        $_res = $this->getDb()->fetchAll($_sql);

        $matieres = array();
        foreach($_res as $row){
            $matiereId = $row['id_discipline'];
            $matieres[$matiereId] = $this->buildDomainObject($row);
        }

        return $matieres;
    }

    /**
     * @param $id
     * @return Discipline
     * @throws \Exception
     * fonction de recherche de matière unique par ID
     */
    public function find($id)
    {
        $sql = "SELECT * FROM discipline WHERE id_discipline=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune matière pour l'id : ".$id);
    }

    /**
     * @param Discipline $_discipline
     *
     * Ajout et modification d'une matière
     */
    public function saveDiscipline(Discipline $_discipline)
    {
        $discipline = array(
            '$name_discipline' => $_discipline->getNameDiscipline(),
            /*'id_evaluation' => $_discipline->getEvaluation()->getDiscipline(),*/
            '$dt_create' => $_discipline->getDtCreate(),
            '$dt_update' => $_discipline->getDtUpdate(),
        );

        if($_discipline->getIdDiscipline()){
            $this->getDb()->update('student', $discipline, array(
                'id_discipline' => $_discipline->getIdDiscipline()));
        }
        else{
            $this->getDb()->insert('discipline', $discipline);
            $id = $this->getDb()->lastInsertId();
            $_discipline->setIdDiscipline($id);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * Suppression d'une matière par l'id
     */
    public function deleteDiscipline($id)
    {
        $this->getDb()->delete('discipline', array(
            'id_discipline' => $id
        ));
    }

    /**
     * @param $row
     * @return Discipline
     *
     * Construction de l'objet Discipline, la matière
     */
    protected function buildDomainObject($row)
    {
        $discipline = new Discipline();
        $discipline->setIdDiscipline($row['id_discipline']);
        $discipline->setNameDiscipline($row['name_discipline']);
        $discipline->setDtCreate($row['dt_create']);
        $discipline->setDtUpdate($row['dt_update']);

        /*if(array_key_exists('id_evaluation', $row))
        {
            $evaluationID = $row['id_evaluation'];
            $evaluation = $this->evaluationDAO->find($evaluationID);
            $discipline->setEvaluation($evaluation);
        }*/

        return $discipline;
    }

}
