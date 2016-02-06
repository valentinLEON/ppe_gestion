<?php

/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 12:24
 */
class classCategory
{
    private $id_classCategory;

    private $className;

    private $classRoom;

    private $classYears;

    private $dtCreate;

    private $dtUpdate;

    public function getIdClassCategory()
    {
        return $this->id_classCategory;
    }

    public function getNameClass()
    {
        return $this->className;
    }

    public function getClassRoom()
    {
        return $this->classRoom;
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