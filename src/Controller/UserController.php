<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\User;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\ClassName;



class UserController {


    /**
     * User page controller.
     */
    public function indexAction(Application $app) {
              
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $users = $app['dao.user']->findAll();

       return $app['twig']->render('ListTemplate/userslist.html.twig', array(
           'classe'        =>$classes,
           'discipline'    =>$disciplines,
           'role'          =>$roles,
           'users'         =>$users,
       ));
    }
    
    //               TABLEAU DE BORD USER
     public function tabUserAction(Application $app) {
              
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $users = $app['dao.user']->findAll();

       return $app['twig']->render('TabTemplate/usertab.html.twig', array(
           'classe'        =>$classes,
           'discipline'    =>$disciplines,
           'role'          =>$roles,
           'users'         =>$users,
       ));
    }

    /**
     * User LIST  controller.
    */
        
    public function listUserIndexAction(Application $app) {
                   
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $users = $app['dao.user']->findAll();


       return $app['twig']->render('ListTemplate/userslist.html.twig', array(
           'classe'        =>$classes,
           'discipline'    =>$disciplines,
           'role'          =>$roles,
           'users'         =>$users,
       ));

    }
    

    public function listUserAction(Request $request, $app) {
       
       $users = $app['dao.user']->findAll();   
               
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $users = $app['dao.user']->findAll();
        
       $id_user = $request->request->get('id_user'); 
       $id_class = $request->request->get('id_class');
       $id_discipline = $request->request->get('id_discipline');

        $classe = $app['dao.classNames']->findClassname($id_class);            
        $discipline = $app['dao.discipline']->findDiscipline($id_discipline);
        $user = $app['dao.user']->findUser($id_user);

        return $app['twig']->render('ListTemplate/userslist.html.twig', array(
            
            'classes'        =>$classes,
            'disciplines'    =>$disciplines,
            'roles'          =>$roles,
            'users'          =>$users,
            'id_class'       => $id_class,
            'id_discipline'  => $id_discipline,
            'id_user'        => $id_user,
            
        ));
//        return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
//    //        'classe'        => $classes,
//    //        'discipline'    => $disciplines,
//    //        'role'          => $roles,
//    //        'id_class'      => $id_classe,
//    //        'id_discipline' => $id_discipline,
//    //        'id_role'       => $id_role,
//            'id_user'       => $id_users,
//        ));
    }

//                              INDEX DE L AJOUT D UTILISATEURS
    public function addIndexAction(Application $app) {
    
        $classes = $app['dao.classNames']->findAll();
        $discipline = $app['dao.discipline']->findAll();
        $users = $app['dao.user']->findAll();
        
       return $app['twig']->render('FormTemplate/adduser.html.twig', array( 
           
                'classe'           =>    $classes,
                'discipline'       =>    $discipline,
                'user'             =>    $users,  
           ));
    }
    
    
//                              FONCTION D AJOUT D UTILISATEUR
    public function addAction(Request $request, Application $app) {

       // recupere les infos enregistrés concernant l utilisateur
        $username = $request->request->get('username');
        $name = $request->request->get('name');
        $firstname = $request->request->get('firstname');
        $description = $request->request->get('description');
        $password = $request->request->get('password');
        $role = $request->request->get('role');
        $id_discipline = $request->request->get('id_discipline');
        $id_class = $request->request->get('id_class');
        $user_mail = $request->request->get('user_mail');
        $dt_create = date('Y-m-d H:i:s');
        $dt_update = date('Y-m-d H:i:s') ;
    
        $newUser = new User();

        $newUser->setUsername($username);
        $newUser->setName($name);
        $newUser->setFirstName( $firstname);
        $newUser->setDescription($description);
        $newUser->setPassword($password);
        $newUser->setRole($role);
        $newUser->setIdDiscipline($id_discipline);
        $newUser->setIdClassName($id_class);
        $newUser->setUserMail($user_mail);
        $newUser->setDtCreate($dt_create);
        $newUser->setDtUpdate();
         
    if($newUser->getUsers())
    {
        $app['dao.user']->saveUser($newUser); 
        
        $app['session']->getFlashBag()->add('success', 'Utilisateur bien enregistré');
        
    }else{
 

        $classes = $app['dao.classNames']->findAll();
        $discipline = $app['dao.discipline']->findAll();
        $users = $app['dao.user']->findAll();
 
        return $app['twig']->render('FormTemplate/adduser.html.twig'  , array(
            
           'classe'           =>    $classes,
           'discipline'       =>    $discipline,
           'user'             =>    $users,  
            
           'username'         =>    $username,
           'name'             =>    $name,
           'firstname'        =>    $firstname,
           'description'      =>    $description,
           'password'         =>    $password,
           'role'             =>    $role,
           'user_mail'        =>    $user_mail,
           'id_discipline'    =>    $id_discipline,
           'id_class'         =>    $id_class,

        ));
        
    }
} 


    /**   *             Edit user controller.            */   

    public function editUserIndexAction(Application $app) {

        return $app->redirect($app['url_generator']->generate('userslist'));
    }

    public function editUserAction(Request $request, Application $app) {  
       
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $users = $app['dao.user']->findAll();

        $id_user = $request->request->get('id_user');
        $username = $request->request->get('username');
        $name = $request->request->get('name');
        $firstname = $request->request->get('firstname'); 
        $description = $request->request->get('description');
        $idclass = $request->request->get('id_class_form');
        $id_discipline = $request->request->get('id_discipline');
        $idrole = $request->request->get('id_role'); 
        $password = $request->request->get('password');
        $role = $request->request->get('role');
        $id_class = $request->request->get('id_class');
        $user_mail = $request->request->get('user_mail');
        $date_create = date('Y-m-d H:i:s');
        $users_total = $app['dao.user']->countAll();
        $userById=$app['dao.user']->findUser($id_user);

        
        $newUser = new User(); 

        $newUser->setIdUsers($id_user);
        $newUser->setUsername($username);
        $newUser->setName($name);
        $newUser->setFirstName($firstname);
        $newUser->setDescription($description);
        $newUser->setPassword($password);
        $newUser->setRole($role);
        $newUser->setIdDiscipline($id_discipline);
        $newUser->setIdClassName($id_class);
        $newUser->setUserMail($user_mail);
        $newUser->setDtUpdate($date_create);

        $app['dao.user']->saveUser($newUser);
        
        $app['session']->getFlashBag()->add('success', 'L\'Utilisateur est bien enregistré ');

//        return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
//            'classe'        =>$classes,
//            'discipline'    =>$disciplines,
//            'username'      =>$username,
//            'role'          =>$roles,
//            'role'          =>$roles,
//            'id_class_form' =>$idclass,
//            'id_discipline' =>$id_discipline,
//            'id_role'       =>$idrole,
//            'id_user'       =>$id_users,
//            'users_total'   =>$users_total,
//  
//         ));
        
            return $app['twig']->register('FormTemplate/modifuser.html.twig', array(
            'classe'        =>$classes,
            'discipline'    =>$disciplines,
            'username'      =>$username,
            'role'          =>$roles,
            'role'          =>$roles,
            'id_class_form' =>$idclass,
            'id_discipline' =>$id_discipline,
            'id_role'       =>$idrole,
            'id_user'       =>$id_user,
            'users_total'   =>$users_total,
  
         ));

    }

    
    
    
    
    
    
    
    
    /**  *           Delete user controller.  */
    
    public function deleteUserIndexAction(Application $app) { 
          return $app->redirect($app['url_generator']->generate('userslist/modifuser/delete/id'));
    }
    
// POST ACTION DE SUPPRESSION DE L UTILSATEUR
    
    
    public function deleteUserAction(Request $request, Application $app) {
        
        $id_user = $request->request->get('id_user');
        $newUser = new User();
        
        $newUser->setIdUsers($id_user);
       
        $app['dao.user']->deleteUser($id_user);

        $app['session']->getFlashBag()->add('danger', 'Utilisateur supprimé !');

        // Redirect to list users page

        return $app->redirect($app['url_generator']->generate('userslist'));

    }

}

