<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 05/02/2016
 * Time: 23:07
 */
class student
{
    private $id_student;
    private $name;
    private $firstname;
    private $birthday;
    private $status_student;
    private $email;

    private $dtCreate;
    private $dtUpdate;

    private $id_class; //foreign key


    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getStatusStudent()
    {
        return $this->status_student;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDtCreate()
    {
        return $this->dtCreate;
    }

    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }

    public function getIdClass()
    {
        return $this->id_class;
    }

}