<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 20:42
 k*/

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\ClassName;
use ppe_gestion\Form\Type\AddType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClassNameDAO extends DAO
{
    /*public function newAction(Request $request)
    {
        $add = new AddType();
        $form = $this->createForm(AddType::class, $add);
    }*/

    public $studentDAO;

    /**
     * @param Student $_studentDAO
     * Dépendance sur les étudiants
     */
    public function setStudentDAO(Student $_studentDAO)
    {
        $this->studentDAO = $_studentDAO;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM className WHERE id_class=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune classe pour l'id : ".$id);
    }

    /**
     * @return array
     *
     * Retourne et affiche toutes les classes
     */
    public function findAll()
    {
        $sql = "SELECT * FROM className ORDER BY class_name";

        $res = $this->getDb()->fetchAll($sql);

        $classNames = array();
        foreach($res as $row){
            $_classNameId = $row['id_class'];
            $classNames[$_classNameId] = $this->buildDomainObject($row);
        }

        return $classNames;
    }

    /**
     * @param ClassName $_className
     * Fonction de sauvegarde et de modification des classes
     *
     * TODO: vérifier s'il ne faut pas mettre l'id_student...
     */
    public function saveClassName(ClassName $_className)
    {
        $class = array(
            '$class_name'   => $_className->getClassName(),
            '$class_option' => $_className->getClassOption(),
            '$class_year'   => $_className->getClassYear(),
            'description'  => $_className->getDescription(),
            '$dt_create'    => $_className->getDtCreate(),
            '$dt_update'    => $_className->getDtUpdate(),
        );

        //on modifie
        if($_className)
        {
            $this->getDb()->update('className', $class, array('id_class'=> $_className->getIdClassName()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('className', $class);
            $_id_className = $this->getDb()->lastInsertId();
            $_className->setIdClassName($_id_className);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * Fonction de suppression d'une classe
     */
    public function deleteclassName($id)
    {
        $this->getDb()->delete('className', array(
            'id_class' => $id
        ));
    }

    /**
     * @param $row
     * @return ClassName
     *
     * construction de l'objet concernant les classes
     */
    protected function buildDomainObject($row)
    {
        $class = new ClassName();
        $class->setIdClassName($row['id_class']);
        $class->setClassName($row['class_name']);
        $class->setClassOption($row['class_option']);
        $class->setClassYear($row['class_year']);
        $class->setDescription($row['description']);
        $class->setDtCreate($row['dt_create']);
        $class->setDtUpdate($row['dt_update']);

        return $class;
    }


}
