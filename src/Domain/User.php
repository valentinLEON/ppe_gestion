<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 12/02/2016
 * Time: 12:30
 */



namespace ppe_project_gestion\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    public $id_users;
    public $username;
    public $password;
    public $user_hash;
    public $roles;
    public $dt_create;
    public $dt_update;
    public $id_discipline; /*clé étrangère*/
    public $id_class; /*clé étrangère*/

    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function setIdUsers($_id_users)
    {
        $this->id_users = $_id_users;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($_username)
    {
        $this->username = $_username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($_password)
    {
        $this->password = $_password;
    }

    public function getUserHash()
    {
        return $this->user_hash;
    }

    public function setUserHash($_user_hash)
    {
        $this->user_hash = $_user_hash;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($_roles)
    {
        $this->roles = $_roles;
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

    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function setIdDiscipline($_id_discipline)
    {
        $this->id_discipline = $_id_discipline;
    }

    public function getIdClass()
    {
        return $this->id_class;
    }

    public function setIdClass($_id_class)
    {
        $this->id_class = $_id_class;
    }

    public function eraseCredentials()
    {
        // Nothing to do here
    }

}