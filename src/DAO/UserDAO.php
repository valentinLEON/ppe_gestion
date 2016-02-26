<?php
/**
 * Created by PhpStorm.
 * User: nfilskov
 * Date: 12/02/2016
 * Time: 19:08
 */


namespace ppe_gestion\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use ppe_gestion\Domain\User;
use ppe_gestion\Domain\Discipline;

class UserDAO extends DAO implements UserProviderInterface
{

    //Ajout de la fonction findAll, pour rechercher tous les utilisateurs
    public function findAll()
    {
        $sql = "SELECT * FROM users ORDER BY role, username";
        $res = $this->getDb()->fetchAll($sql);

        $users = array();
        foreach($res as $row)
        {
            $id = $row['id_users'];
            $users[$id] = $this->buildDomainObject($row);
        }

        return $users;
    }

    /**
     * @param $id
     * @return User
     * @throws \Exception
     *
     * Retourne un utilisateur via son id
     */
    public function find($id)
    {
        $sql = "SELECT * FROM users";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

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
//        $class = get_class($user);
//        if(!$this->supportsClass($class)){
//            throw new UnsupportedUserException(sprintf('instances of "%s" are not supported.', $class));
//        }
//        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return 'ppe_gestion\Domain\User' === $class;
    }
    
    
    
   public function saveUser(User $user)
    {
   
         if($user->getIdUsers())
        {
            $this->getDb()->update('user', $user, array(
                
                'id_users'=> $user->getIdUsers(),
                'username'=> $user->getUsername(), 
                'name'=> $user->getName(),
                'firstname'=> $user->getFirstname(),
                'password'=> $user->getPassword(),
                'salt'=> $user->getSalt(),
                'role'=> $user->getRole(), 
                'status'=> $user->getStatus(), 
                'user_mail'=> $user->getUserMail(), 
                'description'=> $user->getDescription(), 
                'dt_create'=> $user->getDtCreate(), 
                'dt_update'=> $user->getDtUpdate(), 
                'id_discipline'=> $user->getIdDiscipline(), 
              //  'id_class'=> $user->getIdClass(),
            ));
        }
        else{
            $this->getDb()->insert('user', $user);
            $_id_users = $this->getDb()->lastInsertId();
            $user->setIdUser($_id_users);
            $_id_class = $this->getDb()->lastInsertId();
            $user->setIdUser($_id_class);
        }
        
      
    }

    
    
    protected function buildDomainObject($row)
    {
        $user = new User();
        $user->setIdUsers($row['id_users']);
        $user->setUsername($row['username']);
        $user->setName($row['name']);
        $user->setFirstname($row['firstname']);
        $user->setPassword($row['password']);
        $user->setSalt($row['salt']);
        $user->setRole($row['role']);
        $user->setStatus($row['status']);
        $user->setDescription($row['description']); 
        $user->setUserMail($row['user_mail']);
        $user->setDtCreate($row['dt_create']);
        $user->setDtUpdate($row['dt_update']);

        $user->setIdDiscipline($row['id_discipline']);
        
         //  $user->setIdClass($row['id_class']);
        
        if(array_key_exists('id_class', $row))
        {
            $classID = $row['id_class'];
            $users = $this->UserDAO->findUser($classID);
            $user->setUser($users);
        }

        if(array_key_exists('id_discipline', $row))
        {
            $disciplineID = $row['id_discipline'];
            $discipline = $this->disciplineDAO->findDiscipline($disciplineID);
            $evaluation->setDiscipline($discipline);
        }
        return $user;
    }
}