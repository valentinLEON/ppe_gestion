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
    private $userToClass;

    public function saveUserToClass(UserToClass $_userToClass)
    {
        
        
        $userInfo = array(
            '$username'     => $User->getUserName(),
            '$name'         => $User->getName(),
            '$firstname'    => $User->getFirstname(),
            '$dt_create'    => $User->getDtCreate(),
            '$dt_update'    => $User->getDtUpdate(),
        );

        //on modifie
        if($User->getIdUser()){
            $this->getDb()->update('user', $userInfo, array(
                'id' => $User->getIdUser()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('user', $userInfo);
            $id = $this->getDb()->lastInsertId();
            $User->setIdUser($id);
        }
    }

    protected function buildDomainObject($row)
    {
        $userToClass = new UserToClass();
        $userToClass->setIdClassName($row['id_className']);
        $userToClass->setIdUser($row['id_user']);

        return $userToClass;
    }

}