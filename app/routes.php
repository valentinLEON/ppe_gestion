<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Domain\Discipline;
use ppe_gestion\Domain\Student;
use ppe_gestion\Domain\User;

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
    
    return $app['twig']->render('index.html.twig'); 
       
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
    return $app['twig']->render('TabTemplate/admintab.html.twig');
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
        'students' => $etudiants));
})->bind('studentslist');

/**
 *  *   
 *                     AJOUT
 * 
 * route pour l'ajout des étudiants
 */
$app->get('/addstudent', function () use ($app) {
    return $app['twig']->render('FormTemplate/addstudent.html.twig');
})->bind('addstudent');

$app->post('/addstudent/', function(Request $request) use($app){
    $newStudent = new Student();

    $newStudentToClass = new StudentToClass();

    $newStudent->setName($request->request->get('name'));
    $newStudent->setFirstname($request->request->get('firstname'));
    $newStudent->setBirthday($request->request->get('birthday'));
    $newStudent->setAddress($request->request->get('address'));
    $newStudent->setTel($request->request->get('phone'));
    $newStudent->setStudentStatut($request->request->get('statut'));
    $newStudent->setDtCreate(date('Y-m-d'));
    $newStudent->setDtUpdate(date('Y-m-d'));

    $app['dao.student']->saveGrade($newStudent);

    //   var_dump($newEvaluation);

    return new Response('Bien joué kiki', 201);
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('addstudent');

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
    return $app['twig']->render('FormTemplate/adduser.html.twig');
})->bind('adduser');


$app->post('/adduser', function(Request $request) use ($app){
   
    $newUser = new User();
 
    $user = $app['dao.users']->findAll($request->request->get('user'));
    $user->setIdUsers($row['id_users']);
    $newUser->setUsername($request->request->get('username'));
    $newUser->setName($request->request->get('name'));
    $newUser->setFirstName($request->request->get('firstname'));
    $newUser->setPassword($request->request->get('password'));
    $newUser->setSalt($request->request->get('salt'));
    $newUser->setRole($request->request->get('role'));
    $newUser->setStatus($request->request->get('status'));   
    $newUser->setDescription($request->request->get('description'));
    $newUser->setUserMail($request->request->get('user_mail'));
    $newUser->setDtCreate(date('Y-m-d'));
    $newUser->setDtUpdate(date('Y-m-d'));
    
   $newUser->setIdClass($request->request->get('id_class'));
    var_dump($newUser);

    $app['dao.users']->saveUser($newUser);
    
    
   
    return new Response('Bien joué aussi', 201);
    //$app['session']->getFlashBag()->add('success', 'La note a bien été ajouté !'); //message flash success si réussi
})->bind('user');

/**
 *     
 *                     LISTE 
 * 
 * route pour l'affichage de la liste des utilisateurs
 */
$app->get('/userslist', function () use ($app) {
    
    return $app['twig']->render('ListTemplate/userslist.html.twig');
    
})->bind('userslist');

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
    return $app['twig']->render('ListTemplate/classeslist.html.twig');
})->bind('classeslist');

/**
 *                     AJOUT
 * 
 * 
 * route pour l'ajout des classes
 */
$app->match('/addclass', function () use ($app) {
    return $app['twig']->render('FormTemplate/addclass.html.twig');
})->bind('addclass');



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
    return $app['twig']->render('ListTemplate/disciplineslist.html.twig');
})->bind('disciplineslist');


/**
 * 
 *                     AJOUT
 *
 * route pour l'ajout des matières
 */
$app->get('/adddiscipline', function () use ($app) {
    return $app['twig']->render('FormTemplate/adddiscipline.html.twig');
})->bind('adddiscipline');



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
    $etudiant = $app['dao.student']->findAll();

    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant));
    
})->bind('addnote');

$app->post('/addnote', function(Request $request) use ($app){

    $newEvaluation = new Evaluation();
    $message = 0; //booléen qui affiche ou non un message de succes

    $student = $app['dao.student']->findStudent($request->request->get('etudiant'));
    $discipline = $app['dao.discipline']->findDiscipline($request->request->get('matiere'));

    $newEvaluation->setGradeStudent($request->request->get('note'));
    $newEvaluation->setDiscipline($discipline);
    $newEvaluation->setStudent($student);
    $newEvaluation->setCoefDiscipline($request->request->get('coeff'));
    $newEvaluation->setJudgement($request->request->get('judgement'));
    $newEvaluation->setDtCreate(date('Y-m-d'));
    $newEvaluation->setDtUpdate(date('Y-m-d'));

    //$app['dao.evaluation']->saveGrade($newEvaluation);
    var_dump(array($this->getDiscipline()));
    /*if($message)
    {
        $app['session']->getFlashBag()->add('INFORMATION', 'La note a bien été ajouté !');
    }
    else{$app['session']->getFlashBag()->add('INFORMATION', 'La note a pas été ajouté !');}*/

    //return $app['twig']->render('/addnote');
    //return new Response('Bien joué kiki', 201);
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




/**                                                              ABSCENCES
 * 
 * 
 *                      TABLEAU DE BORD
 * 
 * route pour l'affichage du tableaud de bord des abscences
 */
$app->get('/absencetab', function () use ($app) {
    return $app['twig']->render('TabTemplate/absencetab.html.twig');
})->bind('absencetab');


/**
 * 
 *                             LISTE
 * 
 * 
 * route pour l'affichage de la liste des abscences
 */
$app->get('/abscenceslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/abscenceslist.html.twig');
})->bind('abscenceslist');




/**
 *                             AJOUT
 * 
 * route pour l'ajout d abscence
 */
$app->get('/addabscence', function () use ($app) {
    return $app['twig']->render('FormTemplate/addabscence.html.twig');
})->bind('addabscence');


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
