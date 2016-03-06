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
    public $user_mail;

    public $name;

    public $firstname;

    public $description;

    public $password;
    /**
     * @var string
     * type de hashage de l'utilisateur
     */
    public $salt;

    /**
     * @var
     * Rôle de l'utilisateur
     */
    public $role;

    public $id_discipline; /*clé étrangère*/
    public $id_class; /*clé étrangère*/
    public $status;//
    
    public $id_teacher;

    public $dt_create;
    public $dt_update;


    //region Getter et Setter de l'ID de l'utilisateur
    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function setIdUsers($_id_users)
    {
        $this->id_users = $_id_users;
    }
    //endregion

    //region Getter et Setter du pseudo de l'utilisateur
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($_username)
    {
        $this->username = $_username;
    }
    //endregion

    //region Getter et Setter du nom de l'utilisateur
    public function getName()
    {
        return $this->name;
    }

    public function setName($_name)
    {
        $this->name = $_name;
    }
    //endregion

    //region Getter et Setter du prénom de l'utilisateur
    public function getFirstName()
    {
        return $this->username;
    }

    public function setFirstName($_firstname)
    {
        $this->firstname = $_firstname;
    }
    //endregion

    //region Getter et Setter du mot de passe de l'utilisateur
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($_password)
    {
        $this->password = $_password;
    }
    //endregion

    //region Getter et Setter de Hachage du mot de passe
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($_salt)
    {
        $this->salt = $_salt;
    }
    //endregion

    //region Getter et Setter du role de l'utilisateur
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($_role)
    {
        $this->role = $_role;
    }
    //endregion

    //Getter des roles des utilisateur
    public function getRoles()
    {
        return array($this->getRole());
    }

    //region Getter et Setter de l'Email de l'utilisateur
    public function getUserMail()
    {
        return $this->user_mail;
    }

    public function setUserMail($_user_mail)
    {
        $this->user_mail = $_user_mail;
    }
    //endregion

    //region Getter et Setter de la description de l'utilisateur
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
    }
    //endregion

    //region Getter et Setter de la date de création de l'utilisateur
    public function getDtCreate()
    {
        return $this->dt_create;
    }

    public function setDtCreate($_dt_create)
    {
        $this->dt_create = $_dt_create;
    }
    //endregion

    //region Getter et Setter de la date de modification de l'utilisateur
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    public function setDtUpdate($_dt_update)
    {
        $this->dt_update = $_dt_update;
    }
    //endregion

    //region Getter et Setter de la clé etrangère de l'ID discipline et de l'Id className
    //id_discipline
    public function getIdDiscipline()
    {
        return $this->id_discipline;
    }

    public function setIdDiscipline($_id_discipline)
    {
        $this->id_discipline = $_id_discipline;
    }

    //id_className
    public function getIdClassName()
    {
        return $this->id_class;
    }

    public function setIdClassName($_id_class)
    {
        $this->id_class = $_id_class;
    }
    //endregion
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($_status)
    {
        $this->id_class = $_status;
    }


    public function eraseCredentials()
    {
       // Nothing to do here;
    }
    
    
        //region Getter et Setter de l'ID de l'utilisateur
    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

    public function setIdTeacher($_id_teacher)
    {
        $this->id_teacher = $_id_teacher;
    }
    //endregion

    
    

}