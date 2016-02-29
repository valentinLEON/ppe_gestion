<?php

namespace ppe_gestion\Domain;
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:14
 *
 * Class avec les getters et setters pour les matières
 */
class Discipline
{
    public $id_discipline;
    public $name_discipline;
    public $description;

    public $dt_create;
    public $dt_update;

    //region Getter et Setter pour l'ID la discipline
    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function setIdDiscipline($_id_discipline)
    {
        $this->id_discipline = $_id_discipline;
    }
    //endregion

    //region Getter et Setter pour le nom de la discipline
    public function getNameDiscipline()
    {
        return $this->name_discipline;
    }

    public function setNameDiscipline($_name_discipline)
    {
        $this->name_discipline = $_name_discipline;
    }
    //endregion

    //region Getter et Setter pour la description de la discipline
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
    }
    //endregion

    /**
     * @return mixed
     */
 /*   public function getEvaluation()
    {
        return $this->evaluation;
    }
*/
    /**
     * @param mixed $evalutation
     */
/*    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;
    }
*/
    //region Getter et Setter de la date de création d'une discipline
    public function getDtCreate()
    {
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }
    //endregion

    //region Getter et Setter de la date de modifiation d'une discipline
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
    }
    //endregion
}
