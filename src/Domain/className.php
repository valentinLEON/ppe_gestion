<?php
/**/
namespace ppe_project_gestion\Domain\className;
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
    private $id_className;

    private $class_name;

    private $class_option;

    private $class_year;

    private $dt_create;

    private $dt_update;

    private $id_student; /*clé étrangère*/

    public function getIdClassName()
    {
        return $this->id_className;
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
        $this->class_name = $_dt_update;
    }

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function setIdStudent($_id_student)
    {
        $this->id_student = $_id_student;
    }
}