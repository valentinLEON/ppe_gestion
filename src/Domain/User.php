<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 12/02/2016
 * Time: 12:30
 */



namespace ppe_gestion\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    public $id_users;
    public $username;
    public $password;
    public $salt;
    public $role;
    public $description;

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

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($_salt)
    {
        $this->salt = $_salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($_role)
    {
        $this->role = $_role;
    }

    /**
     * @return array
     * Retourne une liste des rôles des utilisateurs
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
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