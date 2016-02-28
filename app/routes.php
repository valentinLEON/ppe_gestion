<?php

use Symfony\Component\HttpFoundation\Request;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Domain\Student;
use ppe_gestion\Domain\UserToClass;
use ppe_gestion\Domain\User;
use ppe_gestion\Domain\ClassName;
use ppe_gestion\Domain\Discipline;
use ppe_gestion\Domain\Examen;

// PAS TOUCHER use ppe_gestion\Form\Type\addNoteForm;

/**
 * TODO: faire les routes pour afficher les listes des datas
 */

/**                                                            ACCUEIL
 * 
 *                              AFFICHAGE ACCUEIL
 * 
 * Acces avec SecurityProvider

$app->get('/', function(Request $request) use ($app) {
    
    return $app['twig']->render('index.html.twig'), array(
        'error' => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
    
});
 */
$app->get('/', function(Request $request) use ($app) {
    
     $classes = $app['dao.classNames']->findAll();
     $classes_total = $app['dao.classNames']->countAll();
    
     $students = $app['dao.student']->findAll();
     $students_total = $app['dao.student']->countAll();
     $date = date("d/m/Y");
     
    return $app['twig']->render('index.html.twig', array(
            'classes'=>$classes,
            'classes_number'=>$classes_total,
            'students'=>$students,
            'students_number'=>$students_total,


            'date'=>$date,

            )

           );
    
});
//                                                             LOGIN 

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        //'last_username' => $app['session']->get('_security.last_username'),
    ));
    var_dump($request);
})->bind('login');



 /*                                                                 ADMIN

 *                       TESTS POUR LES ROUTES
 * 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/testroutes', function () use ($app) {
    return $app['twig']->render('testroutes.html.twig');
})->bind('testroutes');

/*
 *                       TESTS POUR LES LOGINS
 * 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/testlogin', function () use ($app) {
    return $app['twig']->render('testlogin.html.twig');
})->bind('testlogin');


/**                                                          
 * 
 *                        TABLEAU DE BORD 
 * 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/admintab', function () use ($app) {
         
     $users = $app['dao.users']->findAll();
     $users_total = $app['dao.users']->countAll(); 

     $classes = $app['dao.classNames']->findAll();
     $classes_total = $app['dao.classNames']->countAll();
      
     $students = $app['dao.student']->findAll();
     $students_total = $app['dao.student']->countAll();
          
     $disciplines = $app['dao.discipline']->findAll();
     $disciplines_total = $app['dao.discipline']->countAll();
     
     $date = date("d/m/Y");
    
    return $app['twig']->render('TabTemplate/admintab.html.twig', array(
        
        'users'=>$users,
        'users_number'=>$users_total,
        'disciplines'=>$disciplines,
        'disciplines_number'=>$disciplines_total,
        'absences_number'=>'1',
        'retards_number'=>'1',
        'retards_number'=>'1',
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'students'=>$students,
        'students_number'=>$students_total,
        'classes_number'=>$classes_total,
        'disciplines_number'=>$disciplines_total,
        'date'=>$date,
        
    ));
    
    
})->bind('admintab');

/**
 * 
 *  *   
*                                                                   LOGIN
 * route pour afficher le login
 */
$app->get('/login', function (Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
     //   'error' => $app['security.last.error']($request),
    //    'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');





/**                                                            ETUDIANTS
 *   
 *                     TABLEAU DE BORD 
 * 
 * route pour l'affichage de la gestion des etudiants
 */
$app->get('/studenttab', function () use ($app) {
    return $app['twig']->render('TabTemplate/studenttab.html.twig');
})->bind('studenttab');



/**
 *  *   
 *                     LISTE 
 * 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/studentslist', function () use ($app) {
    $etudiants = $app['dao.student']->findAll();

    return $app['twig']->render('ListTemplate/studentslist.html.twig', array(
        'students' => $etudiants
    ));
})->bind('studentslist');

/**
 *  *   
 *                     AJOUT
 * 
 * route pour l'affichage du template de l'ajout des étudiants
 * avec l'affichage des classes dans la liste déroulante
 */
$app->get('/addstudent', function () use ($app) {
    $classes = $app['dao.classNames']->findAll();

    return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
        'classes' => $classes
    ));
})->bind('addstudent');

$app->post('/addstudent', function(Request $request) use($app){
    $newStudent = new Student();

    $class = $app['dao.classNames']->findClassname($request->request->get('classname'));

    $newStudent->setName($request->request->get('name'));
    $newStudent->setFirstname($request->request->get('firstname'));
    $newStudent->setBirthday($request->request->get('birthday'));
    $newStudent->setAddress($request->request->get('address'));
    $newStudent->setTel($request->request->get('phone'));
    $newStudent->setEmail($request->request->get('email'));
    $newStudent->setStudentStatut($request->request->get('statut'));
    $newStudent->setDtCreate(date('Y-m-d H:i:s'));
    $newStudent->setDtUpdate(date('Y-m-d H:i:s'));
    $newStudent->setClass($class);

    $app['dao.student']->saveStudent($newStudent);

    $classes = $app['dao.classNames']->findAll();

    return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
        'classes' => $classes
    ));
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('student');

/**
 *     
 *                    STATISTIQUES
 * 
 *
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/studentstats', function () use ($app) {
    return $app['twig']->render('StatTemplate/studentstats.html.twig');
})->bind('studentstats');



/**                                                           UTILISATEURS

 *   
 *                     TABLEAU DE BORD 
 */
$app->get('/usertab', function () use ($app) {
    return $app['twig']->render('TabTemplate/usertab.html.twig');
})->bind('usertab');

/*    *
 *                     AJOUT
 * 
 * route pour l'ajout des utilisateurs
 */
$app->get('/adduser', function () use ($app) {
    
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $users = $app['dao.users']->findAll();
     
     
    return $app['twig']->render('FormTemplate/adduser.html.twig', array(
        'classe'=>$classes,
        'discipline'=>$disciplines,
        'role'=>$users,
        'message'=>'',
        'id_users'=>$users,
        'user'=>$users,
    ));
    
})->bind('adduser');


$app->post('/adduser', function(Request $request) use ($app){
   
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
 
   
    $app['dao.users']->saveUser($newUser);
    
    $classes = $app['dao.classNames']->findAll();
    $disciplines = $app['dao.discipline']->findAll();
    $role = $app['dao.users']->findAll();
    $id_users = $app['dao.users']->findAll();
  
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
     
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('user');

// Modification de l'utilisateur

$app->get('/modifuser', function () use ($app) {
     
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $users = $app['dao.users']->findAll();
     $users_total = $app['dao.users']->countAll();
  
     $modification='';
     
    return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
        'classe'        =>$classes,
        'discipline'    =>$disciplines,
        'role'          =>$users,
        'users'         =>$users,
        'username'      =>$users,
        'users_total'   =>$users_total,
        'modification'  =>$modification,
    
    ));
    
})->bind('modifuser');
// Modification de l'utilisateur

$app->post('/modifuser', function (Request $request) use ($app) {
       
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $roles = $app['dao.users']->findAll();
     $id_users = $app['dao.users']->findAll();
     $username = $app['dao.users']->findAll();
     
     $iduser= $request->request->get('id_users[]');    
     $modification= $request->request->get('modification');    
     $idclass = $request->request->get('id_class_form');
     $id_discipline = $request->request->get('id_discipline');
     $idrole = $request->request->get('id_role'); 
  
     $users_total = $app['dao.users']->countAll();
   //  $id_class = $app['dao.classNames']->findClassname($idclass);
   //  $id_discipline = $app['dao.discipline']->findDiscipline($iddiscipline);
   //  $id_role = $app['dao.users']->find($idrole);
     $id_user_form = $app['dao.users']->find($iduser);
     
    return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
        'classe'        =>$classes,
        'discipline'    =>$disciplines,
        'username'      =>$username,
        'role'          =>$roles,
        'role'          =>$roles,
        'id_class_form' =>$idclass,
        'id_class'      =>$idclass,
        'id_discipline' =>$id_discipline,
        'id_role'       =>$idrole,
        'id_user'       =>$id_users,
        'id_users'      =>$iduser,
        'user_form'     =>$id_user_form,
        'users_total'   =>$users_total,
        'modification'  =>$modification,
   
    ));
    
})->bind('modifusers');


/**
 *     
 *                     LISTE 
 * 
 * route pour l'affichage de la liste des utilisateurs
 */
$app->get('/userslist', function () use ($app) {
                  
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $roles = $app['dao.users']->findAll();
     $users = $app['dao.users']->findAll();
   
     
    return $app['twig']->render('ListTemplate/userslist.html.twig', array(
        'classe'        =>$classes,
        'discipline'    =>$disciplines,
        'role'          =>$roles,
        'users'         =>$users,
    ));
    
    
    
})->bind('userslist');

// modifier un utilisateur
$app->post('/userslist', function (Request $request) use ($app) {
       
   $id_users_form= $request->request->get('id_user');
   $id_class_form= $request->request->get('id_class');
   $id_discipline_form= $request->request->get('id_discipline');
   
            
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $roles = $app['dao.users']->findAll();
     $id_users = $app['dao.users']->findAll();
     $idclassUser = $app['dao.users']->findAll();
    
     $id_class_User=$idclassUser.id_class;
     
     $id_classe =   $app['dao.classNames']->findClassname($id_class_User);
             
           
     $id_discipline = $app['dao.discipline']->findDiscipline($id_discipline_form);
     $id_role = $app['dao.users']->find($id_users_form);
     
    return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
        'classe'        =>$classes,
        'discipline'    =>$disciplines,
        'role'          =>$roles,
        'id_class'      =>$id_classe,
        'id_discipline' =>$id_discipline,
        'id_role'       =>$id_role,
        'id_user'       =>$id_users,
    ));
    
    
    
})->bind('users');

/**
 *   
*                                                                CALENDRIER
*
 * route pour afficher le calendrier
 */
$app->get('/calendar', function () use ($app) {
    //$eval = $app['dao.evaluation']->findAllByDiscipline(1);
    return $app['twig']->render('calendar.html.twig');
})->bind('calendar');

/**                                                              CLASSES
 *
 *                   TABLEAU DE BORD
 * 
 * 
 * route pour l'ajout des classes
 */
$app->match('/classetab', function () use ($app) {
    return $app['twig']->render('TabTemplate/classetab.html.twig');
})->bind('classetab');

 /**
 * 
 *                       LISTE
 * 
 * 
 * route pour l'affichage de la liste des classes
 */
$app->get('/classeslist', function () use ($app) {
    
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $users = $app['dao.users']->findAll();
     
    return $app['twig']->render('ListTemplate/classeslist.html.twig', array(
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'users'=>$users,
    ));
    
})->bind('classeslist');

/**
 *                     AJOUT
 * 
 * 
 * route pour l'ajout des classes
 */
$app->get('/addclass', function () use ($app) {
    return $app['twig']->render('FormTemplate/addclass.html.twig');
})->bind('addclass');

$app->post('/addclass', function(Request $request) use ($app){
    $newClass = new ClassName();

    $newClass->setClassName($request->request->get('class'));
    $newClass->setClassOption($request->request->get('option'));
    $newClass->setClassYear($request->request->get('year'));
    $newClass->setDescription($request->request->get('description'));
    $newClass->setNombreEtudiant($request->request->get('nombreEtudiant'));
    $newClass->setDtCreate(date('Y-m-d H:i:s'));
    $newClass->setDtUpdate(date('Y-m-d H:i:s'));

    $app['dao.classNames']->saveClassName($newClass);
    $app['session']->getFlashBag()->add('success', 'La classe a été ajouté avec succès !');

    return $app->redirect('/addclass', 301);

})->bind('class');


/**                                                            DISCIPLINES
 * 
 *  
 *                   TABLEAU DE BORD
 * 
 */
$app->match('/disciplinetab', function () use ($app) {
    return $app['twig']->render('TabTemplate/disciplinetab.html.twig');
})->bind('disciplinetab');

/**   
 * 
 *                       LISTE
 * 
 * 
 * route pour l'affichage de la liste des matières
 */
$app->get('/disciplineslist', function () use ($app) {
    
     $classes = $app['dao.classNames']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $users = $app['dao.users']->findAll();
     
    return $app['twig']->render('ListTemplate/disciplineslist.html.twig', array(
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'users'=>$users,
    ));
    
})->bind('disciplines');


/**
 * 
 *                     AJOUT
 *
 * route pour l'ajout des matières
 */
$app->get('/adddiscipline', function () use ($app) {
    return $app['twig']->render('FormTemplate/adddiscipline.html.twig');
})->bind('adddiscipline');

$app->post('adddiscipline', function(Request $request) use($app){
    $newDiscipline = new Discipline();

    $newDiscipline->setNameDiscipline($request->request->get('matiere'));
    $newDiscipline->setDescription($request->request->get('description'));
    $newDiscipline->setDtCreate(date('Y-m-d H:i:s'));
    $newDiscipline->setDtUpdate(date('Y-m-d H:i:s'));

    $app['dao.discipline']->saveDiscipline($newDiscipline);

    return  $app['twig']->render('FormTemplate/adddiscipline.html.twig');
    
})->bind('discipline');

/**                                                 NOTES         - EVALUATIONS
 * 
 *  
 *                   TABLEAU DE BORD STATS DES NOTES
 * 
 */
$app->get('/notetab', function () use ($app) {
    return $app['twig']->render('StatTemplate/notestat.html.twig');
})->bind('notetabstats');

/**   
 * 
 *                       LISTE
 * 
 * 
 * route pour l'affichage de la liste des notes - evaluations
 */
$app->get('/notelist', function () use ($app) {
    return $app['twig']->render('ListTemplate/notelist.html.twig');
})->bind('notelist');


/**   
 * 
 *              AJOUT
 * 
 * 
 *                                  Route pour l'ajout des notes et commentaires
 */

$app->get('/addnote',function() use ($app) {

    $classes = $app['dao.classNames']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $student = $app['dao.student']->findAll();

    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $student));
    
})->bind('addnote');

$app->post('/addnote', function(Request $request) use ($app){

    $newEvaluation = new Evaluation();

    $student = $app['dao.student']->findStudent($request->request->get('etudiants'));
    $discipline = $app['dao.discipline']->findDiscipline($request->request->get('matiere'));

    $newEvaluation->setGradeStudent($request->request->get('note'));
    $newEvaluation->setDiscipline($discipline);
    $newEvaluation->setStudent($student);
    $newEvaluation->setCoefDiscipline($request->request->get('coeff'));
    $newEvaluation->setJudgement($request->request->get('judgement'));
    $newEvaluation->setDtCreate(date('Y-m-d H:i:s'));
    $newEvaluation->setDtUpdate(date('Y-m-d H:i:s'));

    $app['dao.evaluation']->saveGrade($newEvaluation);
    
    $classes = $app['dao.classNames']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $student = $app['dao.student']->findAll();

    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $student));

   $app['session']->getFlashBag()->add('success', 'La note a été ajoutée avec succès !');

    return $app->redirect('/addnote', 301);

})->bind('note');


/**
 * 
 *          
 *                          STATISTIQUES
 * 
 * route pour afficher les stats des notes
 */
$app->get('/notestats', function () use ($app) {
    return $app['twig']->render('StatTemplate/notestats.html.twig');
})->bind('notestats');


/**
 * Récupère via l'url les examens
 */
$app->get('/addexamen', function() use($app){
    return $app['twig']->render('FormTemplate/addexam.html.twig');
})->bind('addexamen');

/**
 * Récupère les données en post et insère en base de données
 *
 * Avec un message de succès en flash
 */
$app->post('/addexamen', function(Request $request) use($app){
    $newExamen = new Examen();

    $newExamen->setNameExamen($request->request->get('name'));
    $newExamen->setDateExamen($request->request->get('date'));
    $newExamen->setDescriptionExamen($request->request->get('description'));

    $newExamen->setDtCreate(date('Y-m-d H:i:s'));
    $newExamen->setDtUpdate(date('Y-m-d H:i:s'));

    $app['dao.examen']->saveExamen($newExamen);

    $app['session']->getFlashBag()->add('success', 'L\'examen a été ajouté avec succès !');

    return $app->redirect('/addexamen', 301);
})->bind('exam');


/**                                                              ABSENCES
 * 
 * 
 *                      TABLEAU DE BORD
 * 
 * route pour l'affichage du tableaud de bord des absences
 */
$app->get('/absencetab', function () use ($app) {
    return $app['twig']->render('TabTemplate/absencetab.html.twig');
})->bind('absencetab');


/**
 * 
 *                             LISTE
 * 
 * 
 * route pour l'affichage de la liste des absences
 */
$app->get('/absenceslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/absenceslist.html.twig');
})->bind('absenceslist');




/**
 *                             AJOUT
 * 
 * route pour l'ajout d absence
 */
$app->get('/addabsence', function () use ($app) {
    return $app['twig']->render('FormTemplate/addabsence.html.twig');
})->bind('addabsence');


/**                                                               RETARDS
 * 
 *                      AJOUT
 * 
 * 
 * route pour l'ajout de retard
 */
$app->get('/addretard', function () use ($app) {
    return $app['twig']->render('FormTemplate/addretard.html.twig');
})->bind('addretard');


/**
 * 
 *                           LISTE
 * 
 * 
 * route pour l'affichage de la liste des retards
 */
$app->get('/retardslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/retardslist.html.twig');
})->bind('retardslist');




/**                        STATISTIQUES
 * 
 *                       TABLEAU DE BORD
 * 
 * 
 * route pour afficher un tableau de bord de toutes les statistiques 
 */
$app->get('/stattab', function () use ($app) {
    return $app['twig']->render('TabTemplate/stattab.html.twig');
})->bind('stattab');
