<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 */

namespace ppe_project_gestion\DAO;

use Doctrine\DBAL\Connection;
use ppe_project_gestion\Domain\Discipline;


class disciplineDAO
{
    private $db;

    public function __construct(Connection $_db)
    {
        $this->db = $_db;
    }

    //affiche toutes les matières.
    public function findAll()
    {
        $_sql = "SELECT * FROM discipline ORDER BY name_discipline";
        $_res = $this->db->fetchAll($_sql);

        $_matieres = array();
        foreach($_res as $row){
            $_matiereId = $row['id_discipline'];
            $_matieres[$_matiereId] = $this->buildDiscipline($row);
        }

        return $_matieres;
    }

    private function buildDiscipline(array $row)
    {
        $discipline = new \ppe_project_gestion\Domain\discipline\Discipline();
        $discipline->setIdEvaluation(['matiere_id']);
        $discipline->setNameDiscipline(['matiere_name']);
        $discipline->setDtCreate(getdate());
        $discipline->setDtUpdate(getdate());

        return $discipline;
    }

}