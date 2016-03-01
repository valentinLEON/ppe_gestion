<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 01/03/2016
 * Time: 17:55
 */

namespace ppe_gestion\Domain;


class Event
{
    public $id;
    public $title;
    public $start;
    public $end;

    public $dt_create;
    public $dt_update;


    //region GETTER et SETTER de l'id de l'event
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    //endregion

    //region GETTER et SETTER du titre de l'event
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    //endregion

    //region GETTER et SETTER de la date de début de l'event
    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
    //endregion

    //region GETTER et SETTER de la date de fin de l'event
    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    //region GETTER et SETTER des date de création et de mise à jour
    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
    //endregion

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
    //endregion

}