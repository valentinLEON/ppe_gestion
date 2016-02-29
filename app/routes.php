<?php

/**                                                           Home controller 
 * 
 *                                                                ACCUEIL
 * 
 *                              AFFICHAGE ACCUEIL        * */
$app->get('/', "ppe_gestion\Controller\HomeController::indexAction");

/**                                                                LOGIN
 * route pour afficher le login
 */
$app->get('/login', "ppe_gestion\Controller\HomeController::loginAction")->bind('login');

/** 
 *                                                       TESTS POUR LES ROUTES
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/testroutes',"ppe_gestion\Controller\HomeController::testroutesAction")->bind('testroutes');
/*
 *                                                       TESTS POUR LES LOGINS
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/testlogin',"ppe_gestion\Controller\HomeController::testloginAction")->bind('testlogin');



 /*                                                           AdminController                                                   
 *                        TABLEAU DE BORD 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/admintab', "ppe_gestion\Controller\AdminController::indexAction")->bind('admintab');



/**                                                          StudentController
 * 
 *                                                               ETUDIANTS
 *   
 *                                                            TABLEAU DE BORD 
 * 
 * route pour l'affichage de la gestion des etudiants
 */
$app->get('/studenttab',"ppe_gestion\Controller\StudentController::indexAction")->bind('studenttab');

/**
 *                                                                LISTE 
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/studentslist',"ppe_gestion\Controller\StudentController::listIndexAction")->bind('studentslist');

/**
 *                                                                AJOUT
 * route pour l'affichage du template de l'ajout des étudiants
 * avec l'affichage des classes dans la liste déroulante
 */
$app->get('/addstudent', "ppe_gestion\Controller\StudentController::addIndexAction")->bind('addstudent');

$app->post('/addstudent', "ppe_gestion\Controller\StudentController::addAction")->bind('student');

/* *                    STATISTIQUES
 * route pour l'affichage de la liste des etudiants*/
$app->get('/studentstats',  "ppe_gestion\Controller\StudentController::studentStatIndex")->bind('studentstats');



/**                                                                     UserController   
 *                                               UTILISATEURS              **
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

    
/**                                                         CalendarController    
 *      
 *                                                              CALENDRIER
 * route pour afficher le calendrier*/
$app->get('/calendar',"ppe_gestion\Controller\CalendarController::indexAction")->bind('calendar');


/**                                                         ClassNameController                                                
 *
 *                                                                CLASSES
 *                                   TABLEAU DE BORD
 * route pour l'ajout des classes
 */
$app->match('/classetab', "ppe_gestion\Controller\ClassNameController::indexAction")->bind('classetab');

 /**
 *                                        LISTE
 * 
 * route pour l'affichage de la liste des classes
 */
$app->get('/classeslist', "ppe_gestion\Controller\ClassNameController::listClassNameindexAction")->bind('classeslist');

/**
 *                                         AJOUT
 * route pour l'ajout des classes
 */
$app->get('/addclass', "ppe_gestion\Controller\ClassNameController::addClassNameAction")->bind('addclass');

$app->post('/addclass', "ppe_gestion\Controller\ClassNameController::addClassNameAction")->bind('class');


/**                                                              DisciplineController
 * 
 *                                                                  DISCIPLINES
 *                   TABLEAU DE BORD                */
$app->get('/disciplinetab',  "ppe_gestion\Controller\DisciplineController::tabDisciplineAction")->bind('disciplinetab');

  /**                   LISTE
 * route pour l'affichage de la liste des matières          */
 $app->get('/disciplineslist', "ppe_gestion\Controller\DisciplineController::listDisciplineIndexAction")->bind('list_disciplines');
 $app->get('/disciplineslist', "ppe_gestion\Controller\DisciplineController::listDisciplineAction")->bind('post_list_disciplines');

/**                      AJOUT
 * route pour l'ajout des matières      */
$app->get('/adddiscipline', "ppe_gestion\Controller\DisciplineController::addDisciplineIndexAction" )->bind('adddiscipline');
$app->post('adddiscipline', "ppe_gestion\Controller\DisciplineController::addDisciplineAction")->bind('discipline');



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
        'student' => $student)
            
      );

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


/**                                                              EXAMEN
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
