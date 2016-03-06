<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 06/03/2016
 * Time: 17:18
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Discipline;
use ppe_gestion\Domain\Teacher;


class TeacherDAO extends DAO
{
    public $disciplineDAO;

    /**
     * @param mixed $_disciplineDAO
     */
    public function setDisciplineDAO(Discipline $_disciplineDAO)
    {
        $this->disciplineDAO = $_disciplineDAO;
    }

    /**
     * @param $id
     * @return Teacher
     * @throws \Exception
     *
     * On sélectionne un professeur par son id
     */
    public function findTeacher($id)
    {
        $sql = "SELECT * FROM teacher WHERE id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else{
            throw new \Exception("Aucun professeur pour l'id : ".$id);
        }
    }

    /**
     * @return array
     *
     * On affiche les professeurs
     */
    public function findAll()
    {
        $sql = "SELECT * FROM teacher ORDER BY id";

        $res = $this->getDb()->fetchAll($sql);

        $teachers = array();
        foreach($res as $row){
            $_teacherId = $row['id'];
            $teachers[$_teacherId] = $this->buildDomainObject($row);
        }

        return $teachers;
    }

    /**
     * @return int
     *
     * On compte le nombre total de professeurs
     */
    public function countAll()
    {
        $sql = "SELECT * FROM teacher ORDER BY id";

        $res = $this->getDb()->fetchAll($sql);

        $teacher_total = array();
        foreach($res as $row){
            $_teacherId = $row['id_class'];
            $teacher_total[$_teacherId] = $this->buildDomainObject($row);
        }

        return count($teacher_total);
    }

    /**
     * @param Teacher $_teacher
     *
     * On sauvegarde ou modifie un professeur
     */
    public function saveTeacher(Teacher $_teacher)
    {
        $prof = array(
            'id'                    => $_teacher->getId(),
            'teacher_name'          => $_teacher->getTeacherName(),
            'teacher_firstname'     => $_teacher->getTeacherFirstname(),
            'teacher_mail'          => $_teacher->getTeacherMail(),
            'id_discipline'         => $_teacher->getDiscipline()->getIdDiscipline(),
            'dt_create'             => $_teacher->getDtCreate(),
            'dt_update'             => $_teacher->getDtUpdate(),
        );

        //on modifie
        if($_teacher->getId())
        {
            $this->getDb()->update('teacher', $prof, array(
                'id_class'=> $_teacher->getId()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('className', $prof);
            $_id_teacher = $this->getDb()->lastInsertId();
            $_teacher->setId($_id_teacher);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * On supprime un professeur par l'id
     */
    public function deleteTeacher($id)
    {
        $this->getDb()->delete('teacher', array(
            'id' => $id
        ));
    }

    /**
     * @param $row
     * @return Teacher
     *
     * On construit l'objet Teacher (professeur)
     */
    protected function buildDomainObject($row)
    {
        $teacher = new Teacher();

        $teacher->setId($row['id']);
        $teacher->setTeacherName($row['teacher_name']);
        $teacher->setTeacherFirstname($row['teacher_firstname']);
        $teacher->setTeacherMail($row['teacher_mail']);
        $teacher->setDtCreate($row['dt_create']);
        $teacher->setDtUpdate($row['dt_update']);

        if(array_key_exists('id_discipline', $row))
        {
            $disciplineID = $row['id_discipline'];
            $discipline = $this->disciplineDAO->findDiscipline($disciplineID);
            $teacher->setDiscipline($discipline);
        }

        return $teacher;
    }

}