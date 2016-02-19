<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 15:10
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Student;


class StudentDAO extends DAO
{
    //affiche tous les étudiants.
    public function findAll()
    {
        $_sql = "SELECT * FROM student ORDER BY student_name";
        $_res = $this->getDb()->fetchAll($_sql);

        $etudiants = array();
        foreach($_res as $row){
            $_etudiantId = $row['id_student'];
            $etudiants[$_etudiantId] = $this->buildDomainObject($row);
        }

        return $etudiants;
    }

    /**
     * @param Student $student
     * Fonction de sauvegarde d'un étudiant
     */
    public function saveStudent(Student $student)
    {
        $studentInfo = array(
            '$student_name' => $student->getName(),
            '$student_firstname' => $student->getFirstname(),
            '$student_birthday' => $student->getBirthday(),
            '$student_email' => $student->getEmail(),
            '$student_address' => $student->getAddress(),
            '$student_tel' => $student->getTel()
        );

        if($student->getIdStudent()){
            $this->getDb()->update('users', $studentInfo, array(
                'id_users' => $student->getIdStudent()));
        }
        else{
            $this->getDb()->insert('users', $studentInfo);
            $id = $this->getDb()->lastInsertId();
            $student->setIdStudent($id);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     * Fonction de suppression d'un utilisateur
     */
    public function deleteStudent($id)
    {
        $this->getDb()->delete('users', array(
            'id_users' => $id
        ));
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
        $student->setIdEvaluation($row['id_evaluation']);
        $student->setDtCreate($row['dt_create']);
        $student->setDtUpdate($row['dt_update']);

        return $student;
    }
}
