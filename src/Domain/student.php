<?php

/**/
namespace ppe_project_gestion\Domain\student;
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
    private $id_student;
    private $student_name;
    private $student_firstname;
    private $student_birthday;
    private $student_email;
    private $student_address;
    private $student_tel;

    private $id_evaluation; /*clé étrangère*/

    private $dt_create;
    private $dt_update;

    public function getIdStudent()
    {
        return $this->id_student;
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

    public function getTel()
    {
        return $this->student_tel;
    }

    public function setTel($_student_tel)
    {
        $this->student_tel = $_student_tel;
    }

    public function getAddress()
    {
        return $this->student_address;
    }

    public function setAddress($_student_address)
    {
        $this->student_address = $_student_address;
    }

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

    public function getIdEvaluation()
    {
        return $this->id_evaluation;
    }

    public function setIdEvaluation($_id_evaluation)
    {
        $this->id_evaluation = $_id_evaluation;
    }

}