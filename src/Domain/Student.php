<?php

namespace ppe_gestion\Domain;
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:07
 *
 * Getters et setters des étudiants
 */
class Student
{
    public $id_student;

    public $student_name;
    public $student_firstname;
    public $student_birthday;
    public $student_email;
    public $student_address;
    public $student_tel;
    public $student_statut;

    public $class;

    public $dt_create;
    public $dt_update;


    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function setIdStudent($_id_student)
    {
        $this->id_student = $_id_student;
    }

    public function getName()
    {
        return $this->student_name;
    }

    public function setName($_student_name)
    {
        $this->student_name = $_student_name;
    }

    public function getFirstname()
    {
        return $this->student_firstname;
    }

    public function setFirstname($_student_firstname)
    {
        $this->student_firstname = $_student_firstname;
    }

    public function getBirthday()
    {
        return $this->student_birthday;
    }

    public function setBirthday($_student_birthday)
    {
        $this->student_birthday = $_student_birthday;
    }

    public function getEmail()
    {
        return $this->student_email;
    }

    public function setEmail($_student_email)
    {
        $this->student_email = $_student_email;
    }

    public function getAddress()
    {
        return $this->student_address;
    }

    public function setAddress($_student_address)
    {
        $this->student_address = $_student_address;
    }

    public function getTel()
    {
        return $this->student_tel;
    }

    public function setTel($_student_tel)
    {
        $this->student_tel = $_student_tel;
    }

    public function getStudentStatut()
    {
        return $this->student_statut;
    }

    public function setStudentStatut($_student_statut)
    {
        $this->student_statut = $_student_statut;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }



    /**
     * @return mixed
     *
     * LES DATES D'AJOUT ET DE MISE A JOUR
     */

    public function getDtCreate()
    {
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }

    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
    }
}
