<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 12/02/2016
 * Time: 12:30
 */



namespace ppe_gestion\Domain;


class Parent
{
    public $id_parent;

    public $adresse_parent;
    public $id_student1;
    public $id_student2;
    public $id_student3;
    public $id_student4;

    public $dt_create;
    public $dt_update;


    //region Getter et Setter de l'ID parent
    public function getIdParent()
    {
        return $this->id_parent;
    }

    public function setIdParent($_id_parent)
    {
        $this->id_parent = $_id_parent;
    }
    //endregion

    
    //region Getter et Setter adresse parent
    public function getAdresseParent()
    {
        return $this->addresse_parent;
    }
    
    public function setAdresseParent($_addresse_parent)
    {
        $this->adresse_parent = $__adresse_parent;
    }
    //endregion
    
       //region Getter et Setter de l'ID student1
    public function getIdStudent1()
    {
        return $this->id_student1;
    }

    public function setIdStudent1($_id_student1)
    {
        $this->id_student1 = $_id_student1;
    }
    //endregion
    //
       //region Getter et Setter de l'ID student2
    public function getIdStudent2()
    {
        return $this->id_student2;
    }

    public function setIdStudent2($_id_student2)
    {
        $this->id_student1 = $_id_student1;
    }
    //endregion
    //
       //region Getter et Setter de l'ID student3
    public function getIdStudent3()
    {
        return $this->id_student3;
    }

    public function setIdStudent3($_id_student3)
    {
        $this->id_student3 = $_id_student3;
    }
    
    //endregion
       //region Getter et Setter de l'ID student2
    public function getIdStudent4()
    {
        return $this->id_student4;
    }

    public function setIdStudent4($_id_student4)
    {
        $this->id_student4 = $_id_student4;
    }
    //endregion


    
    
    
    
    
    
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



}