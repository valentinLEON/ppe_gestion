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
    public $nombreEtudiant;

    public $student;
    public $discipline;

    public $dt_create;
    public $dt_update;

    //region Getter et Setter pour l'ID de la classe
    public function getIdClassName()
    {
        return $this->id_className;
    }

    public function setIdClassName($_id_className)
    {
        $this->id_className = $_id_className;
    }
    //endregion

    //region Getter et Setter pour le nom de la classe
    public function getClassName()
    {
        return $this->class_name;
    }

    public function setClassName($_class_Name)
    {
        $this->class_name = $_class_Name;
    }
    //endregion

    //region Getter et Setter pour le nom de l'option
    public function getClassOption()
    {
        return $this->class_option;
    }

    public function setClassOption($_class_option)
    {
        $this->class_option = $_class_option;
    }
    //endregion

    //region Getter et Setter pour la description
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
    //endregion

    //region Getter et Setter pour le nombre d'étudiant
    /**
     * @return mixed
     */
    public function getNombreEtudiant()
    {
        return $this->nombreEtudiant;
    }

    /**
     * @param mixed $nombreEtudiant
     */
    public function setNombreEtudiant($nombreEtudiant)
    {
        $this->nombreEtudiant = $nombreEtudiant;
    }
    //endregion

    //region Getter et Setter pour l'année
    public function getClassYear()
    {
        return $this->class_year;
    }

    public function setClassYear($_class_year)
    {
        $this->class_year = $_class_year;
    }
    //endregion

    //region Getter et Setter pour les dates d'ajout et de mise à jour
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
    //endregion

    //region Getter et Setter pour l'objet Etudiant
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
    //endregion

    //region Getter et Setter pour l'objet Matière
    public function getDiscipline()
    {
        return $this->discipline;
    }

    public function setDiscipline($_discipline)
    {
        $this->discipline = $_discipline;
    }
    //endregion

    /**
     * @return array
     *
     * Fonction retournant un tableau des matières
     */
    public function getDisciplines()
    {
        return array($this->getDiscipline());
    }
            
}
