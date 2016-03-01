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


class UserDAO extends DAO implements UserProviderInterface
{

    /**
     * @param $id
     * @return User
     * @throws \Exception
     *
     * Retourne un utilisateur via son id
     */
    public function findUser($id)
    {
        $sql = "SELECT * FROM users WHERE id_users=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else
        {
            throw new \Exception("No user matching id " . $id);
        }
    }

    //Ajout de la fonction findAll, pour rechercher tous les utilisateurs
    public function findAll()
    {
        $sql = "SELECT * FROM users ORDER BY role, username";
        $res = $this->getDb()->fetchAll($sql);

        $users = array();
        foreach($res as $row)
        {
            $id_user = $row['id_users'];
            $users[$id_user] = $this->buildDomainObject($row);
        }

        return $users;
    }

// SUPPRIME LE USER    
 /*   public function deleteUserAction($id, Application $app) {
       
        // Delete the user
        $app['dao.user']->delete($id);
        $app['session']->getFlashBag()->add('success', 'The user was succesfully removed.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('userlist'));
    }
 */
    
    
    
    
    // fonction count a utiliser directement dans les autres fonctions
    public function countAll()
    {
        $sql = "SELECT * FROM users";
        $res = $this->getDb()->fetchAll($sql);

        $users_total = array();
        foreach($res as $row)
        {
            $id_user = $row['id_users'];
            $users_total[$id_user] = $this->buildDomainObject($row);
        }

        return count($users_total);
    }
    
    
    
    // MODIFE LE USER
   /* public function editUserAction($id, Request $request, Application $app) {
        
        $user = $app['dao.user']->find($id);
        $userForm = $app['form.factory']->create(new UserType(), $user);
        $userForm->handleRequest($request);
        
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $plainPassword = $user->getPassword();
            // find the encoder for the user
            $encoder = $app['security.encoder_factory']->getEncoder($user);
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);
            $app['session']->getFlashBag()->add('success', 'The user was succesfully updated.');
        }
        
        return $app['twig']->render('user_form.html.twig', array(
            'title' => 'Edit user',
            'userForm' => $userForm->createView()));
    }

*/
    
    //SELECTIONNE LES INFOS DU USER PRENDS EN PARAMETRE LE USERNDAME ??? VAUT MIEUX ID SAUF SI ON VEUX TRIER PAR NOM DE USER
    public function loadUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if($row){
            return $this->buildDomainObject($row);
        }
        else{
            throw new UsernameNotFoundException(sprintf('L\'utilisateur "%s" est introuvable.', $username));
        }
    }

    // NE SAIT PAS PREND EN PARAMETRE SUOI
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if(!$this->supportsClass($class)){
            throw new UnsupportedUserException(sprintf('instances of "%s" are not supported.', $class));
        }return $this->loadUserByUsername($user->getUsername());
    }

    // NE SAIT PAS NON PLUS
    public function supportsClass($class)
    {
        return 'ppe_gestion\Domain\User' === $class;
    }
    
    
    // ENREGISTRE LE USER 
   public function saveUser(User $user)
    {     
        $userInfo= array( 
            'username'      => $user->getUsername(), 
            'name'          => $user->getName(),
            'firstname'     => $user->getFirstname(),
            'password'      => $user->getPassword(),
            'role'          => $user->getRole(),
            'user_mail'     => $user->getUserMail(), 
            'description'   => $user->getDescription(), 
            'dt_create'     => $user->getDtCreate(), 
            'dt_update'     => $user->getDtUpdate(), 
            'id_discipline' => $user->getIdDiscipline(), 
            'id_class'      => $user->getIdClassName(),
            );
        
        //on modifie
        if($user->getIdStudent()){
            $this->getDb()->update('users',$userInfo, array(
                'id_user' => $student->getIdUser()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('users',$userInfo);   $id = $this->getDb()->lastInsertId();
            $student->setIdStudent($id);
        }
      }

    
                             // Delete LE USER 
    
    public function deleteUser($id)
    {     
        $this->getDb()->delete('users', array(
            'id_users' => $id
        ));      
    }
    
    // CREER NOTRE INSTANCE DE LA CLASSE USER
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
        $user->setDescription($row['description']); 
        $user->setUserMail($row['user_mail']);
        $user->setDtCreate($row['dt_create']);
        $user->setDtUpdate($row['dt_update']);
        $user->setIdDiscipline($row['id_discipline']);
        $user->setIdClassName($row['id_class']);
        
        return $user;
    }
}