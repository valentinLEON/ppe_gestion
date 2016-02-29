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


/**
 * 
 *  *   
*                                                                   LOGIN
 * route pour afficher le login
 */
$app->get('/login', function (Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
    /*  'error' => $app['security.last.error']($request),
        'last_username' => $app['session']->get('_security.last_username'),*/
    ));
})->bind('login');




 /*                                                                 ADMIN
                                                         
 * 
 *                        TABLEAU DE BORD 
 * 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/admintab', "ppe_gestion\Controller\AdminController::indexAction")->bind('admintab');


/** 
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



/**                                                           UTILISATEURS              **
 * 
 * 
 *   
 *                   TABLEAU DE BORD DE GESTION DES UTILISATEURS        */
    $app->get('/usertab',  "ppe_gestion\Controller\UserController::tabUserAction")->bind('userstab');
/**
 *                             LISTE DES UTILSATEURS       */
    $app->get('/userslist', "ppe_gestion\Controller\UserController::listUserIndexAction")->bind('userslist');
// liste des utilisateurs  renvoyant l'id selectionné à la fonction modifier
    $app->post('/userslist', "ppe_gestion\Controller\UserController::listUserAction")->bind('users');

//                                SUPPRIME USER
    $app->get('/modifuser/delete', "ppe_gestion\Controller\UserController::deleteUserIndexAction")->bind('user_delete');
    $app->post('/modifuser/delete', "ppe_gestion\Controller\UserController::deleteUserAction")->bind('user_deleted');
                
//                                 MODIFIE USER
    $app->get('/modifuser/edit', "ppe_gestion\Controller\UserController::editUserIndexAction")->bind('user_edit');
    $app->post('/modifuser/edit', "ppe_gestion\Controller\UserController::editUserAction")->bind('user_edited');

/*  //                              AJOUT USER
 *  //* route pour l'affichage du formulaire d ajout d utilisateurs */
    $app->get('/adduser', "ppe_gestion\Controller\UserController::addUserIndexAction")->bind('user_add');
 //* route pour la soumission du formulaire d ajout d utilisateurs
    $app->post('/adduser', "ppe_gestion\Controller\UserController::addUserAction")->bind('user_added');



/**
 *   
*                                                                    CALENDRIER
*
 * route pour afficher le calendrier
 */
$app->get('/calendar', function () use ($app) {
    //$eval = $app['dao.evaluation']->findAllByDiscipline(1);
    return $app['twig']->render('calendar.html.twig');
})->bind('calendar');

/**                                                                CLASSES
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
     $users = $app['dao.user']->findAll();
     
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
 *                   TABLEAU DE BORD                */
$app->get('/disciplinetab',  "ppe_gestion\Controller\UserController::tabDisciplineAction")->bind('disciplinetab');

  /**                       LISTE
 * route pour l'affichage de la liste des matières          */
 $app->get('/userslist', "ppe_gestion\Controller\UserController::listDisciplineIndexAction")->bind('disciplines');

/**                   AJOUT
 * route pour l'ajout des matières      */
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
    $app['session']->getFlashBag()->add('success', 'La discipline a été ajoutée avec succès !');
    
    return  $app['twig']->render('FormTemplate/adddiscipline.html.twig');
    
})->bind('discipline');

/**                                                                   NOTES     
 * 
 *  
 *                                  TABLEAU DE BORD STATS DES NOTES
 * 
 */
$app->get('/notetab', function () use ($app) {
    return $app['twig']->render('StatTemplate/notestat.html.twig');
})->bind('notetabstats');

/**   
 * 
 *                                   LISTE
 * 
 * 
 * route pour l'affichage de la liste des notes - evaluations
 */
$app->get('/notelist', function () use ($app) {
    return $app['twig']->render('ListTemplate/notelist.html.twig');
})->bind('notelist');


/**   
 * 
 *                                    AJOUT
 * 
 * 
 *  Route pour l'ajout des notes et commentaires
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

    var_dump($newEvaluation);
        
    
    $app['dao.evaluation']->saveGrade($newEvaluation);
    
    $app['session']->getFlashBag()->add('success', 'La note a été ajoutée avec succès !');
      
    $classes = $app['dao.classNames']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $student = $app['dao.student']->findAll();

    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $student));

 

   // return $app->redirect('/addnote', 301);

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

/**
 *
 *                             LISTE
 *
 *
 * route pour l'affichage de la liste des examens
 */

$app->get('/examlist', function () use ($app) {
    return $app['twig']->render('TabTemplate/examlist.html.twig');
})->bind('examlist');


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
