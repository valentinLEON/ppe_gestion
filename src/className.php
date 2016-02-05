<?php

/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 12:24
 */
class className
{
    private $id_class;

    private $name_class;

    private $classroom;

    private $classYears;

    private $dtCreate;

    private $dtUpdate;

    public function getIdClass()
    {
        return $this->id_class;
    }

    public function getNameClass()
    {
        return $this->name_class;
    }

    public function getClassRoom()
    {
        return $this->classroom;
    }

    public function getClassYears()
    {
        return $this->classYears;
    }

    public function getDtCreate()
    {
        return $this->dtCreate;
    }

    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }
}