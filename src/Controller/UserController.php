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

     *

     * @param Application $app Silex application

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

     *    
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
        
//       $id_users_form = $request->request->get('id_user');
//       $id_users= $request->request->get('id_user');
//       $id_class_form = $request->request->get('id_class');
//       $id_discipline_form = $request->request->get('id_discipline');

        $classes = $app['dao.classNames']->findAll();

        $disciplines = $app['dao.discipline']->findAll();

//        $get_id_users = $app['dao.user']->getIdUsers();
//        $get_id_class = $app['dao.classNames']->getIdClass();
//        $get_id_disciplines = $app['dao.discipline']->getIdDisciplines();
//
//        $set_id_users = $app['dao.user']->setIdUsers($get_id_users);
//
//
//        $get_id_role = $app['dao.user']->findAll(); 
//        $idclassUser = $app['dao.user']->findAll();
//
//
//        $id_classe =   $app['dao.classNames']->findClassname($id_class_User);            
//        $id_discipline = $app['dao.discipline']->findDiscipline($id_discipline_form);
//        $id_role = $app['dao.user']->find($id_users_form);

        return $app['twig']->render('ListTemplate/userslist.html.twig', array(
            'classe'        =>$classes,
            'discipline'    =>$disciplines,
            'role'          =>$roles,
            'users'         =>$users,
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
    public function addUserIndexAction(Application $app) {
        
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $users = $app['dao.user']->findAll();


       return $app['twig']->render('FormTemplate/adduser.html.twig', array(
           'classe'=>$classes,
           'discipline'=>$disciplines,
           'role'=>$users,
           'message'=>'',
           'id_users'=>$users,
           'user'=>$users,
         ));
    }
    
//                              FONCTION D AJOUT D UTILISATEUR
    public function addUserAction(Request $request, Application $app) {
   
        $newUser = new User();

        $newUser->setUsername($request->request->get('username'));
        $newUser->setName($request->request->get('name'));
        $newUser->setFirstName($request->request->get('firstname'));
        $newUser->setDescription($request->request->get('description'));
        $newUser->setPassword($request->request->get('password'));
        $newUser->setSalt($request->request->get('salt'));
        $newUser->setRole($request->request->get('role'));
        $newUser->setIdDiscipline($request->request->get('discipline_form'));
        $newUser->setIdClassName($request->request->get('classname'));
        $newUser->setStatus($request->request->get('status'));   
        $newUser->setUserMail($request->request->get('user_mail'));
        $newUser->setDtCreate(date('Y-m-d H:i:s'));
        $newUser->setDtUpdate(date('Y-m-d H:i:s'));
var_dump($newUser);
        $app['dao.user']->saveUser($newUser);

        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $role = $app['dao.user']->findAll();
        $id_users = $app['dao.user']->findAll();

        $username = $request->request->get('username');
        $name = $request->request->get('name');
        $firstname = $request->request->get('firstname');
        $description = $request->request->get('description');
        $password = $request->request->get('password');
        $salt = $request->request->get('salt');
        $role_form = $request->request->get('role');
        $discipline_form = $request->request->get('discipline_form');
        $classname = $request->request->get('classname');
        $status = $request->request->get('status');   
        $user_mail = $request->request->get('user_mail');

        $message= $request->request->get('message');
        
        $app['session']->getFlashBag()->add('success', 'Utilisateur bien enregistré');
  
        return $app['twig']->render('FormTemplate/adduser.html.twig', array(
           'classe'        =>$classes,
           'discipline'    =>$disciplines,
           'role_form'     =>$role_form,      
           'message'       =>$message,
           'id_users'      =>$id_users,
           'username'      =>$username,
           'name'          =>$name,
           'firstname'     =>$firstname,
           'description'   =>$description,
           'password'      =>$password,
           'salt'          =>$salt,
           'role'          =>$role,
           'discipline_form' =>$discipline_form,
           'classname'     =>$classname,
           'status'        =>$status,   
           'user_mail'     =>$user_mail,

           ));
} 


    /**

     * Edit user controller.

     *

     * @param integer $id User id

     * @param Request $request Incoming request

     * @param Application $app Silex application

     */   

    public function editUserIndexAction(Request $request, Application $app) {

        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $id_users = $app['dao.user']->findAll();
        $username = $app['dao.user']->findAll();

        $users_total = $app['dao.user']->countAll();
        
        $app['session']->getFlashBag()->add('success', 'You are in editUserIndexAction');

        return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
            'classe'        =>$classes,
            'discipline'    =>$disciplines,
            'username'      =>$username,
            'role'          =>$roles,
            'id_class_form' =>$idclass,
            'id_discipline' =>$id_discipline,
            'id_role'       =>$idrole,
            'id_user'       =>$id_users,
            'users_total'   =>$users_total,
         ));

    }

  //  public function editUserAction($id, Request $request, Application $app) {
    public function editUserAction(Request $request, Application $app) {

        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $roles = $app['dao.user']->findAll();
        $id_users = $app['dao.user']->findAll();
        $username = $app['dao.user']->findAll();

        $idclass = $request->request->get('id_class_form');
        $id_discipline = $request->request->get('id_discipline');
        $idrole = $request->request->get('id_role'); 

        $users_total = $app['dao.user']->countAll();

        $newUser = new User();
        $newUser->setUsername($request->request->get('username'));
        $newUser->setName($request->request->get('name'));
        $newUser->setFirstName($request->request->get('firstname'));
        $newUser->setDescription($request->request->get('description'));
        $newUser->setPassword($request->request->get('password'));
        $newUser->setSalt($request->request->get('salt'));
        $newUser->setRole($request->request->get('role'));
        $newUser->setIdDiscipline($request->request->get('id_discipline_form'));
        $newUser->setIdUsers($request->request->get('id_user'));
        $newUser->setIdClassName($request->request->get('id_class_form'));
        $newUser->setIdClassName($request->request->get('classname'));
        $newUser->setStatus($request->request->get('status'));   
        $newUser->setUserMail($request->request->get('user_mail'));
        $newUser->setDtUpdate(date('Y-m-d H:i:s'));
var_dump($newUser);
        $app['dao.user']->saveUser($newUser);
        
       $app['session']->getFlashBag()->add('success', 'L Utilisateur Enregistré');

        return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
            'classe'        =>$classes,
            'discipline'    =>$disciplines,
            'username'      =>$username,
            'role'          =>$roles,
            'role'          =>$roles,
            'id_class_form' =>$idclass,
            'id_discipline' =>$id_discipline,
            'id_role'       =>$idrole,
            'id_user'       =>$id_users,
            'users_total'   =>$users_total,
            'modification'  =>$modification,
         ));

    }

    
    /**  *           Delete user controller.  */
    
// Alert Etes vous sur de vouloir supprimer tel utilisateur .    
    public function deleteUserIndexAction(Request $request, Application $app) { 
        // Redirect to admin home page

        return $app->redirect($app['url_generator']->generate('userslist'));
    }
    
// POST ACTION DE SUPPRESSION DE L UTILSATEUR
    public function deleteUserAction(Request $request, Application $app) {

       $id_user = ($request->request->get('id_user'));
       
        var_dump($id_user);

        $app['dao.user']->deleteUser($id_user);

        $app['session']->getFlashBag()->add('danger', 'Utilisateur supprimé !');

        // Redirect to admin home page

        return $app->redirect($app['url_generator']->generate('userslist'));

    }

}

