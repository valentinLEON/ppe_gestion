<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/02/2016
 * Time: 00:20
 *
 * Association entre les classes Class et Student
 */

use ppe_gestion\Domain\ClassName;
use ppe_gestion\Domain\Student;

class UserToClass
{
    public $student;
    public $class;

    /**
     * @param ClassName $_classname
     *
     * Set la classe
     */
    public function setClassName(ClassName $_classname)
    {
        $this->class = $_classname;
    }

    /**
     * @param Student $_student
     *
     * Set un étudiant
     */
    public function setStudent(Student $_student)
    {
        $this->student = $_student;
    }

    /**
     * @return mixed
     *
     * Récupère l'étudiant
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @return mixed
     *
     * Récupère la classe
     */
    public function getClassName()
    {
        return $this->class;
    }

}
