<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 28/02/2016
 * Time: 11:57
 */

namespace ppe_gestion\Domain;


class Examen
{
    public $id_examen;

    public $examen_name;
    public $date_examen;
    public $description_examen;

    public $class;

    public $dt_create;
    public $dt_update;

    //region Getter et Setter de l'ID de l'examen
    public function getIdExamen()
    {
        return $this->id_examen;
    }

    public function setIdExamen($id_examen)
    {
        $this->id_examen = $id_examen;
    }
    //endregion

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $classname
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    //region Getter et Setter du nom de l'examen
    public function getExamenName()
    {
        return $this->examen_name;
    }

    public function setExamenName($examen_name)
    {
        $this->examen_name = $examen_name;
    }
    //endregion

    //region Getter et Setter de la date de l'examen
    public function getDateExamen()
    {
        return $this->date;
    }

    public function setDateExamen($date)
    {
        $this->date = $date;
    }
    //endregion

    //region Getter et Setter de description de l'examen
    public function getDescriptionExamen()
    {
        return $this->description_examen;
    }

    public function setDescriptionExamen($description_examen)
    {
        $this->description_examen = $description_examen;
    }
    //endregion

    //region Getter et Setter de la date de création de l'examen
    public function getDtCreate()
    {
        return $this->dt_create;
    }

    public function setDtCreate($dt_create)
    {
        $this->dt_create = $dt_create;
    }
    //endregion

    //region Getter et Setter de la date de modification d'un examen
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    public function setDtUpdate($dt_update)
    {
        $this->dt_update = $dt_update;
    }
    //endregion
}