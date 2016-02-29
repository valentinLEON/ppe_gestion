<?php

/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/02/2016
 * Time: 00:20
 *
 * Table d'association entre les classes ClassName et User
 */

use ppe_gestion\Domain\ClassName;
use ppe_gestion\Domain\User;

class UserToClass
{
    public $user;
    public $class;


    /**
     * @return mixed
     *
     * Récupère l'étudiant
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $_user
     *
     * Set un user
     */
    public function setUser(User $_user)
    {
        $this->user = $_user;
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

    /**
     * @param ClassName $_classname
     *
     * Set la classe
     */
    public function setClassName(ClassName $_classname)
    {
        $this->class = $_classname;
    }


    public function getIdClass()
    {
        return $this->id_class;
    }

    public function setIdClass($_id_class)
    {
        $this->id_class = $_id_class;
    }

}
