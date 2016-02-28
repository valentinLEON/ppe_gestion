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

    public $name_examen;
    public $date_examen;
    public $description_examen;

    public $dt_create;
    public $dt_update;


    /**
     * @return mixed
     */
    public function getIdExamen()
    {
        return $this->id_examen;
    }

    /**
     * @param mixed $id_examen
     */
    public function setIdExamen($id_examen)
    {
        $this->id_examen = $id_examen;
    }

    /**
     * @return mixed
     */
    public function getNameExamen()
    {
        return $this->name_examen;
    }

    /**
     * @param mixed $name_examen
     */
    public function setNameExamen($name_examen)
    {
        $this->name_examen = $name_examen;
    }

    /**
     * @return mixed
     */
    public function getDateExamen()
    {
        return $this->date_examen;
    }

    /**
     * @param mixed $date_examen
     */
    public function setDateExamen($date_examen)
    {
        $this->date_examen = $date_examen;
    }

    /**
     * @return mixed
     */
    public function getDescriptionExamen()
    {
        return $this->description_examen;
    }

    /**
     * @param mixed $description_examen
     */
    public function setDescriptionExamen($description_examen)
    {
        $this->description_examen = $description_examen;
    }

    /**
     * @return mixed
     */
    public function getDtCreate()
    {
        return $this->dt_create;
    }

    /**
     * @param mixed $dt_create
     */
    public function setDtCreate($dt_create)
    {
        $this->dt_create = $dt_create;
    }

    /**
     * @return mixed
     */
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    /**
     * @param mixed $dt_update
     */
    public function setDtUpdate($dt_update)
    {
        $this->dt_update = $dt_update;
    }

}