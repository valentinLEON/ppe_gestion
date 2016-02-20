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


class DisciplineDAO extends DAO
{

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
        $discipline->setIdEvaluation($row['id_evaluation']);

        return $discipline;
    }

}
