<?php

/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 11:18
 */
class users
{
    private $id_user;

    private $status;

    private $name;

    private $firstname;

    private $email;

    private $atCreate;

    private $atUpdate;

    private $id_class;


    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAtCreate()
    {
        return $this->atCreate;
    }

    public function getAtUpdate()
    {
        return $this->atUpdate;
    }

}