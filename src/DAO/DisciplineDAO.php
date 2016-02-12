<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 */

namespace ppe_project_gestion\DAO;

use ppe_project_gestion\Domain\Discipline;


class DisciplineDAO extends DAO
{

    //affiche toutes les matières.
    public function findAll()
    {
        $_sql = "SELECT * FROM discipline ORDER BY name_discipline";
        $_res = $this->getDb()->fetchAll($_sql);

        $_matieres = array();
        foreach($_res as $row){
            $_matiereId = $row['id_discipline'];
            $_matieres[$_matiereId] = $this->buildDomainObject($row);
        }

        return $_matieres;
    }

    protected function buildDomainObject($row)
    {
        $discipline = new \ppe_project_gestion\Domain\discipline\Discipline();
        $discipline->setIdDiscipline($row['id_discipline']);
        $discipline->setNameDiscipline($row['name_discipline']);
        $discipline->setDtCreate(getdate());
        $discipline->setDtUpdate(getdate());

        return $discipline;
    }

}
