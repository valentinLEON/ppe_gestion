<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Domain\Student;
use ppe_gestion\Domain\UserToClass;
use ppe_gestion\Domain\User;
use ppe_gestion\Domain\ClassName;
use ppe_gestion\Domain\Discipline;

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
    
     $classes = $app['dao.className']->findAll();
     $classes_total = $app['dao.className']->countAll();
     
     $disciplines = $app['dao.discipline']->findAll();
     $disciplines_total = $app['dao.discipline']->countAll();
     
     $students = $app['dao.student']->findAll();
     $students_total = $app['dao.student']->countAll();
     $date = date("d/m/Y");
     
    return $app['twig']->render('index.html.twig', array(
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'students'=>$students,
        'students_number'=>$students_total,
        'classes_number'=>$classes_total,
        'disciplines_number'=>$disciplines_total,
        'absences_number'=>'1',
        'retards_number'=>'1',
        'date'=>$date,
        
        )
    
       );
    
});
//                                                             LOGIN 

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
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
     $disciplines = $app['dao.discipline']->findAll();
     $disciplines_total = $app['dao.discipline']->countAll();
     
    
    return $app['twig']->render('TabTemplate/admintab.html.twig', array(
        
        'users'=>$users,
        'users_number'=>$users_total,
        'disciplines'=>$disciplines,
        'disciplines_number'=>$disciplines_total,
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
    $classes = $app['dao.className']->findAll();

    return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
        'classes' => $classes
    ));
})->bind('addstudent');

$app->post('/addstudent', function(Request $request) use($app){
    $newStudent = new Student();

    $class = $app['dao.className']->findClassname($request->request->get('classname'));

    $newStudent->setName($request->request->get('name'));
    $newStudent->setFirstname($request->request->get('firstname'));
    $newStudent->setBirthday($request->request->get('birthday'));
    $newStudent->setAddress($request->request->get('address'));
    $newStudent->setTel($request->request->get('phone'));
    $newStudent->setEmail($request->request->get('email'));
    $newStudent->setStudentStatut($request->request->get('statut'));
    $newStudent->setDtCreate(date('Y-m-d'));
    $newStudent->setDtUpdate(date('Y-m-d'));
    $newStudent->setClass($class);

  
    
    $app['dao.student']->saveStudent($newStudent);


    return $app['twig']->render('FormTemplate/addstudent.html.twig');
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('student');

/**
 *     
 *                    STATISTIQUES
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
    
     $classes = $app['dao.className']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $roles = $app['dao.users']->findAll();
     
    return $app['twig']->render('FormTemplate/adduser.html.twig', array(
        'classe'=>$classes,
        'discipline'=>$disciplines,
        'role'=>$roles,
    ));
    
})->bind('adduser');


$app->post('/adduser', function(Request $request) use ($app){
   
   $newUser = new User();
   
 //  $classname=$app['dao.className']->$request->request->get('classname');
 //  $discipline=$app['dao.discipline']->$request->request->get('discipline');
  // $user = $app['dao.users']->findAll($request->request->get('user'));
//   $id_class = $app['dao.className']->findClassname($request->request->get('id_class'));
//   $id_discipline = $app['dao.discipline']->findDiscipline($request->request->get('id_discipline'));

  //  $newUser->setIdUsers($request->request->get('id_users'));
    $newUser->setUsername($request->request->get('username'));
    $newUser->setName($request->request->get('name'));
    $newUser->setFirstName($request->request->get('firstname'));
    $newUser->setDescription($request->request->get('description'));
    $newUser->setPassword($request->request->get('password'));
    $newUser->setSalt($request->request->get('salt'));
    $newUser->setRole($request->request->get('role'));
    $newUser->setIdDiscipline($request->request->get('discipline'));
    $newUser->setIdClassName($request->request->get('classname'));
    $newUser->setStatus($request->request->get('status'));   
    $newUser->setUserMail($request->request->get('user_mail'));
    $newUser->setDtCreate(date('Y-m-d'));
    $newUser->setDtUpdate(date('Y-m-d'));
 
    $app['dao.users']->saveUser($newUser);

     return $app['twig']->render('FormTemplate/adduser.html');
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('user');


// Modification de l'utilisateur

$app->get('/modifuser', function () use ($app) {
    
     $classes = $app['dao.className']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $roles = $app['dao.users']->findAll();
     
    return $app['twig']->render('FormTemplate/modifuser.html.twig', array(
        'classe'=>$classes,
        'discipline'=>$disciplines,
        'role'=>$roles,
    ));
    
})->bind('modifuser');


/**
 *     
 *                     LISTE 
 * 
 * route pour l'affichage de la liste des utilisateurs
 */
$app->get('/userslist', function () use ($app) {
       
     $classes = $app['dao.className']->findAll();
     $disciplines = $app['dao.discipline']->findAll();
     $users = $app['dao.users']->findAll();
     
    return $app['twig']->render('ListTemplate/userslist.html.twig', array(
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'users'=>$users,
    ));
    
    
    
})->bind('userlist');

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
    
     $classes = $app['dao.className']->findAll();
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
    $newClass->setDtCreate(date('Y-m-d'));
    $newClass->setDtUpdate(date('Y-m-d'));

    $app['dao.className']->saveClassName($newClass);

    return $app['twig']->render('FormTemplate/addclass.html.twig');
    
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
    
     $classes = $app['dao.className']->findAll();
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
    $newDiscipline->setDtCreate(date('Y-m-d'));
    $newDiscipline->setDtUpdate(date('Y-m-d'));

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

    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $student = $app['dao.student']->findAll();

    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $student));
    
})->bind('addnote');

$app->post('/addnote', function(Request $request) use ($app){

    $newEvaluation = new Evaluation();
    $message = 0; //booléen qui affiche ou non un message de succes

    $student = $app['dao.student']->findStudent($request->request->get('etudiants'));
    $discipline = $app['dao.discipline']->findDiscipline($request->request->get('matiere'));

    $newEvaluation->setGradeStudent($request->request->get('note'));
    $newEvaluation->setDiscipline($discipline);
    $newEvaluation->setStudent($student);
    $newEvaluation->setCoefDiscipline($request->request->get('coeff'));
    $newEvaluation->setJudgement($request->request->get('judgement'));
    $newEvaluation->setDtCreate(date('Y-m-d'));
    $newEvaluation->setDtUpdate(date('Y-m-d'));

    $app['dao.evaluation']->saveGrade($newEvaluation);
    
    return $app['twig']->render('FormTemplate/addnote.html.twig');
    //var_dump(array($this->getDiscipline()));
    /*if($message)
    {
        $app['session']->getFlashBag()->add('INFORMATION', 'La note a bien été ajouté !');
    }
    else{$app['session']->getFlashBag()->add('INFORMATION', 'La note a pas été ajouté !');}*/

    //return $app['twig']->render('/addnote');
  
  //  //  return new Response('Bien joué kiki', 201);
  //  
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
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
