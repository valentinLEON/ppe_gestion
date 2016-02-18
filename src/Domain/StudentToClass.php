<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/02/2016
 * Time: 00:20
 *
 * Association entre les classes Class et Student
 */
class StudentToClass
{
    public $id_student;
    public $id_className;

    /**
     * @param mixed $id_className
     */
    public function setIdClassName($id_className)
    {
        $this->id_className = $id_className;
    }

    /**
     * @param mixed $id_student
     */
    public function setIdStudent($id_student)
    {
        $this->id_student = $id_student;
    }

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function getIdClassName()
    {
        return $this->id_className;
    }

}
