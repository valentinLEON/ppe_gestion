<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 19:08
 */


namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Parent;


class parentDAO extends DAO 
{

    /**
     * @param $id
     * @return User
     * @throws \Exception
     *
     * Retourne un parent via son id
     */
    public function findUser($id)
    {
        $sql = "SELECT * FROM parent WHERE id_parent=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else
        {
            throw new \Exception("No user matching id " . $id);
        }
    }

    //Ajout de la fonction findAll, pour rechercher tous les parents
    public function findAll()
    {
        $sql = "SELECT * FROM parent";
        $res = $this->getDb()->fetchAll($sql);

        $parents = array();
        foreach($res as $row)
        {
            $id_parent = $row['id_parent'];
            $parents[$id_parent] = $this->buildDomainObject($row);
        }

        return $parents;
    }

    
            // ENREGISTRE LE USER 
//   public function saveParent(User $parent)
//    {     
//     
//     }

    
                             // Delete LE USER 
    
    public function deleteUser($id_parent)
    {     
        $this->getDb()->delete('parent', array(
            'id_parent' => $id_parent
        ));      
    }
    
    // CREER NOTRE INSTANCE DE LA CLASSE USER
    protected function buildDomainObject($row)
    {
        $parent = new Parent();
        $parent->setIdParent($row['id_parent']);
        $parent->setUsername($row['addrese_parent']);
        $parent->setIdStudent1($row['id_student1']);
        $parent->setIdStudent2($row['id_student2']);
        $parent->setIdStudent3($row['id_student3']);
        $parent->setIdStudent4($row['id_student4']);
        $parent->setDtCreate($row['dt_create']);
        $parent->setDtUpdate($row['dt_update']);
     

        return $parent;
    }
}