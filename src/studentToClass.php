<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/02/2016
 * Time: 00:20
 *
 * Association entre les classes Class et Student
 */
class studentToClass
{
    private $id_student;
    private $id_className;

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function getIdClassName()
    {
        return $this->id_className;
    }

}