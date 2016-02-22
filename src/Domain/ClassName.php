<?php

namespace ppe_gestion\Domain;
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 12:24
 *
 * Création des getters et setters des classes
 */
class ClassName
{
    public $id_className;
    public $class_name;
    public $class_option;
    public $class_year;
    public $description;

    public $student;

    public $dt_create;
    public $dt_update;

    public $id_student; /*clé étrangère*/


    public function getIdClassName()
    {
        return $this->id_className;
    }

    public function setIdClassName($_id_className)
    {
        $this->id_className = $_id_className;
    }

    public function getClassName()
    {
        return $this->class_name;
    }

    public function setClassName($_class_Name)
    {
        $this->class_name = $_class_Name;
    }

    public function getClassOption()
    {
        return $this->class_option;
    }

    public function setClassOption($_class_option)
    {
        $this->class_option = $_class_option;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getClassYear()
    {
        return $this->class_year;
    }

    public function setClassYear($_class_year)
    {
        $this->class_year = $_class_year;
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

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function setIdStudent($_id_student)
    {
        $this->id_student = $_id_student;
    }

    /**
     * @return mixed
     * Getter sur l'étudiant
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param $_student
     * Setter sur l'étudiant
     */
    public function setStudent($_student)
    {
        $this->student = $_student;
    }
}
