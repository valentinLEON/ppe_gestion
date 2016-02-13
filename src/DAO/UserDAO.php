<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 19:08
 */


namespace ppe_project_gestion\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use ppe_project_gestion\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
{

    public function loadUserByUsername($username)
    {
        $sql = "SELECT * FROM users";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException('User "%s" not found.', $username);
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if(!$this->supportsClass($class)){
            throw new UnsupportedUserException(sprintf('instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return 'ppe_project_gestion\Domain\User' === $class;
    }

    protected function buildDomainObject($row)
    {
        $user = new User();
        $user->setIdUsers($row['id_users']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setSalt($row['user_hash']);
        $user->setRole($row['user_role']);
        $user->setDtCreate($row['dt_create']);
        $user->setDtUpdate($row['dt_update']);
        $user->setIdDiscipline($row['id_discipline']);
        $user->setIdClass($row['id_class']);

        return $user;
    }
}