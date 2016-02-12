<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 15:10
 */

namespace ppe_project_gestion\DAO;

use ppe_project_gestion\Domain\Student;


class StudentDAO extends DAO
{
    //affiche tous les étudiants.
    public function findAll()
    {
        $_sql = "SELECT * FROM student ORDER BY student_name";
        $_res = $this->getDb()->fetchAll($_sql);

        $_etudiants = array();
        foreach($_res as $row){
            $_etudiantId = $row['id_student'];
            $_etudiant[$_etudiantId] = $this->buildDomainObject($row);
        }

        return $_etudiants;
    }

    protected function buildDomainObject($row)
    {
        $student = new Student();
        $student->setIdStudent($row['id_student']);
        $student->setName($row['student_name']);
        $student->setFirstname($row['student_firstname']);
        $student->setBirthday($row['student_birthday']);
        $student->setAddress($row['student_address']);
        $student->setEmail($row['student_email']);
        $student->setTel($row['student_tel']);
        $student->setIdEvaluation($row['id_evaluation_student']);

        return $student;
    }

}
