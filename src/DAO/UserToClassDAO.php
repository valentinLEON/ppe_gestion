<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 11:43
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\UserToClass;

class UserToClassDAO extends DAO
{
    private $studentToClass;

    public function saveStudentToClass(StudentToClass $_studentToClass)
    {
        $studentInfo = array(
            '$student_name'     => $_studentToClass->getName(),
            '$student_firstname'=> $_studentToClass->getFirstname(),
            '$dt_create'        => $_studentToClass->getDtCreate(),
            '$dt_update'        => $_studentToClass->getDtUpdate(),
        );

        //on modifie
        if($student->getIdStudent()){
            $this->getDb()->update('student', $studentInfo, array(
                'id' => $student->getIdStudent()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('student', $studentInfo);
            $id = $this->getDb()->lastInsertId();
            $student->setIdStudent($id);
        }
    }

    protected function buildDomainObject($row)
    {
        $studentToClass = new StudentToClass();
        $studentToClass->setIdClassName($row['id_className']);
        $studentToClass->setIdStudent($row['id_student']);

        return $studentToClass;
    }

}