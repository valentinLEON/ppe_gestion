<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/03/2016
 * Time: 17:16
 */

namespace ppe_gestion\Domain;


class Teacher
{
    public $id;
    public $teacher_name;
    public $teacher_firstname;
    public $teacher_mail;

    public $dt_create;
    public $dt_update;

    public $discipline;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTeacherName()
    {
        return $this->teacher_name;
    }

    /**
     * @param mixed $teacher_name
     */
    public function setTeacherName($teacher_name)
    {
        $this->teacher_name = $teacher_name;
    }

    /**
     * @return mixed
     */
    public function getTeacherFirstname()
    {
        return $this->teacher_firstname;
    }

    /**
     * @param mixed $teacher_firstname
     */
    public function setTeacherFirstname($teacher_firstname)
    {
        $this->teacher_firstname = $teacher_firstname;
    }

    /**
     * @return mixed
     */
    public function getTeacherMail()
    {
        return $this->teacher_mail;
    }

    /**
     * @param mixed $teacher_mail
     */
    public function setTeacherMail($teacher_mail)
    {
        $this->teacher_mail = $teacher_mail;
    }

    /**
     * @return mixed
     */
    public function getDtCreate()
    {
        return $this->dt_create;
    }

    /**
     * @param mixed $dt_create
     */
    public function setDtCreate($dt_create)
    {
        $this->dt_create = $dt_create;
    }

    /**
     * @return mixed
     */
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    /**
     * @param mixed $dt_update
     */
    public function setDtUpdate($dt_update)
    {
        $this->dt_update = $dt_update;
    }

    /**
     * @return mixed
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * @param mixed $discipline
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }
}