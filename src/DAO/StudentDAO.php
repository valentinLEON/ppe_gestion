<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 11/02/2016
 * Time: 15:10
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Student;
//use ppe_gestion\DAO\ClassNameDAO;


class StudentDAO extends DAO
{
    private $classDAO;

    /**
     * @return mixed
     */
    public function getClassDAO()
    {
        return $this->classDAO;
    }

    /**
     * @param mixed $classDAO
     */
    public function setClassDAO($classDAO)
    {
        $this->classDAO = $classDAO;
    }

    /**
     * @return array
     *
     * Recherche tous les étudiants
     */
    public function findAll()
    {
        $_sql = "SELECT * FROM student ORDER BY student_name";
        $_res = $this->getDb()->fetchAll($_sql);

        $etudiants = array();
        foreach($_res as $row){
            $etudiantId = $row['id_student'];
            $etudiants[$etudiantId] = $this->buildDomainObject($row);
        }

        return $etudiants;
    }
    
      /**
     * @return int
     *
     * retourne le nombre d' étudiants
     */
    public function countAll()
    {
        $_sql = "SELECT * FROM student ORDER BY student_name";
        $_res = $this->getDb()->fetchAll($_sql);

        $etudiants_total = array();
        foreach($_res as $row){
            $etudiantId = $row['id_student'];
            $etudiants_total[$etudiantId] = $this->buildDomainObject($row);
        }

        return count($etudiants_total);
    }
    

    /**
     * @param $id
     * @return Student
     * @throws \Exception
     *
     * Recherche un étudiant par son id
     */
    public function findStudent($id)
    {
        $sql = "SELECT * FROM student WHERE id_student=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else{
            throw new \Exception("Aucun étudiant pour l'id : ".$id);
        }
    }

    /**
     * @param Student $student
     * Fonction de sauvegarde d'un étudiant
     */
    public function saveStudent(Student $student)
    {
        $studentInfo = array(
            'student_name'     => $student->getName(),
            'student_firstname'=> $student->getFirstname(),
            'student_birthday' => $student->getBirthday(),
            'student_email'    => $student->getEmail(),
            'student_address'  => $student->getAddress(),
            'student_tel'      => $student->getTel(),
            'dt_create'        => $student->getDtCreate(),
            'dt_update'        => $student->getDtUpdate(),
            'id_class'         => $student->getClass()->getIdClassName(),
        );

        //on modifie
        if($student->getIdStudent()){
            $this->getDb()->update('student', $studentInfo, array(
                'id_student' => $student->getIdStudent()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('student', $studentInfo);
            $id = $this->getDb()->lastInsertId();
            $student->setIdStudent($id);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * Fonction de suppression d'un utilisateur
     */
    public function deleteStudent($id)
    {
        $this->getDb()->delete('users', array(
            'id_users' => $id
        ));
    }

    /**
     * @param $row
     * @return Student
     *
     * Construction d'un objet étudiant
     */
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
        $student->setStudentStatut($row['student_statut']);

        $student->setDtCreate($row['dt_create']);
        $student->setDtUpdate($row['dt_update']);

        if(array_key_exists('id_class', $row))
        {
            $classNameID = $row['id_class'];
            $classname = $this->classDAO->findClassname($classNameID);
            $student->setClass($classname);
        }

        return $student;
    }
}
