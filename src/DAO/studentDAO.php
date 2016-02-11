<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 15:10
 */

namespace ppe_project_gestion\DAO;

use Doctrine\DBAL\Connection;
use ppe_project_gestion\Domain\Student;


class studentDAO
{
    private $db;

    public function __construct(Connection $_db)
    {
        $this->db = $_db;
    }

    //affiche tous les étudiants.
    public function findAll()
    {
        $_sql = "SELECT * FROM student ORDER BY student_name";
        $_res = $this->db->fetchAll($_sql);

        $_etudiants = array();
        foreach($_res as $row){
            $_etudiantId = $row['id_student'];
            $_etudiant[$_etudiantId] = $this->buildStudent($row);
        }

        return $_etudiants;
    }

    private function buildStudent(array $row)
    {
        $student = new Student();
        $student->setName($row['student_name']);
        $student->setFirstname($row['student_firstname']);
        $student->setEmail($row['student_email']);
        $student->setBirthday($row['student_birthday']);

        return $student;
    }

}