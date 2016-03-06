<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 28/02/2016
 * Time: 11:57
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Examen;


class ExamenDAO extends DAO
{
    private $classDAO;

    public function setClassDAO(ClassNameDAO $classDAO)
    {
        $this->classDAO = $classDAO;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     *
     * Retourne un examen par l'id
     */
    public function findExamen($id)
    {
        $sql = "SELECT * FROM examen WHERE id_examen=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else{
            throw new \Exception("Aucun examen pour l'id : ".$id);
        }
    }

    /**
     * @return array
     *
     * Retourne tous les examens
     */
    public function findAll()
    {
        $sql = "SELECT * FROM examen ORDER BY examen_name";

        $res = $this->getDb()->fetchAll($sql);

        $exams = array();
        foreach($res as $row){
            $_examenID = $row['id_examen'];
            $exams[$_examenID] = $this->buildDomainObject($row);
        }

        return $exams;
    }

    /**
     * @return int
     *
     * Retourne le nombre total d'examen
     */
    public function countAll()
    {
        $sql = "SELECT cou* FROM examen ORDER BY name_examen";

        $res = $this->getDb()->fetchAll($sql);

        $exams_total = array();
        foreach($res as $row){
            $_examenID = $row['id_examen'];
            $exams_total[$_examenID] = $this->buildDomainObject($row);
        }

        return count($exams_total);
    }

    /**
     * @param Examen $_examen
     *
     * Fonction de sauvegarde d'un examen
     */
    public function saveExamen(Examen $_examen)
    {
        $exam = array(
            'examen_name'           => $_examen->getExamenName(),
            'date'                  => $_examen->getDateExamen(),
            'description'           => $_examen->getDescriptionExamen(),
            'id_class'              => $_examen->getClass(),
            'dt_create'             => $_examen->getDtCreate(),
            'dt_update'             => $_examen->getDtUpdate(),
        );

        //on modifie
        if($_examen->getIdExamen())
        {
            $this->getDb()->update('examen', $exam, array(
                'id_examen'=> $_examen->getIdExamen()));
        }
        //on sauvegarde
        else
        {
            $this->getDb()->insert('examen', $exam);
            $_id_examen = $this->getDb()->lastInsertId();
            $_examen->setIdExamen($_id_examen);

        }
        
        
    }

    /**
     * @param $id
     *
     * Suppression d'un examen par l'id
     */
    public function deleteExamen($id)
    {
        $this->getDb()->delete('examen', array(
            'id_examen' => $id
        ));
    }

    /**
     * @param $row
     * @return Examen
     *
     * Création de l'objet examen
     */
    protected function buildDomainObject($row)
    {
        $exam = new Examen();
        $exam->setIdExamen($row['id_examen']);

        $exam->setExamenName($row['examen_name']);
        $exam->setDateExamen($row['date']);
        $exam->setDescriptionExamen($row['description']);
        //$exam->setClass($row['id_class']);

        $exam->setDtCreate($row['dt_create']);
        $exam->setDtUpdate($row['dt_update']);

     /*   if(array_key_exists('id_class', $row))
        {
            $classID = $row['id_class'];
            $class = $this->classDAO->findClassname($classID);
            $exam->setClass($class);
        }
*/
        return $exam;
    }

}