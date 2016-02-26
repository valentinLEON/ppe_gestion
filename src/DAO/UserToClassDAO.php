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
    protected function buildDomainObject($row)
    {
        $userToClass = new UserToClass();
        $userToClass->setIdClassName($row['id_className']);
        $userToClass->setIdUser($row['id_user']);

        return $userToClass;
    }

}