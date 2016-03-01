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
$app->match('/modifuser/delete', "ppe_gestion\Controller\UserController::deleteUserIndexAction")->bind('user_delete');
$app->post('/modifuser/delete/id', "ppe_gestion\Controller\UserController::deleteUserAction")->bind('user_deleted');
                
//                                 MODIFIE USER
$app->match('/modifuser/edit/id', "ppe_gestion\Controller\UserController::editUserIndexAction")->bind('user_edit');
$app->match('/modifuser/edit/', "ppe_gestion\Controller\UserController::editUserAction")->bind('user_edited');

/*  //                              AJOUT USER
 *  //* route pour l'affichage du formulaire d ajout d utilisateurs */
$app->get('/adduser', "ppe_gestion\Controller\UserController::addIndexAction")->bind('user_add');
 //* route pour la soumission du formulaire d ajout d utilisateurs
$app->post('/adduser/id', "ppe_gestion\Controller\UserController::addAction")->bind('user_added');

    
/**                                                       
 * 
 *                                                            CalendarController    
 *      
 *                                                              CALENDRIER
 * route pour afficher le calendrier*/
$app->get('/calendar',"ppe_gestion\Controller\CalendarController::indexAction")->bind('calendar');


/**                                                        
 *                                                         ClassNameController                                                
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
$app->get('/classeslist', "ppe_gestion\Controller\ClassNameController::listIndexAction")->bind('classeslist');

/**
 *                                         AJOUT
 * route pour l'ajout des classes
 */
$app->get('/addclass', "ppe_gestion\Controller\ClassNameController::addIndexAction")->bind('addclass');

$app->post('/addclass', "ppe_gestion\Controller\ClassNameController::addAction")->bind('class');


/**                                                              DisciplineController
 * 
 *                                                                  DISCIPLINES
 *                   TABLEAU DE BORD                */
$app->get('/disciplinetab',  "ppe_gestion\Controller\DisciplineController::tabDisciplineAction")->bind('disciplinetab');

  /**                   LISTE
 * route pour l'affichage de la liste des matières          */
 $app->get('/disciplineslist', "ppe_gestion\Controller\DisciplineController::listDisciplineIndexAction")->bind('list_disciplines');
 $app->post('/disciplineslist', "ppe_gestion\Controller\DisciplineController::listDisciplineAction")->bind('post_list_disciplines');

/**                      AJOUT
 * route pour l'ajout des matières      */
$app->get('/adddiscipline', "ppe_gestion\Controller\DisciplineController::addIndexAction" )->bind('adddiscipline');
$app->post('adddiscipline', "ppe_gestion\Controller\DisciplineController::addAction")->bind('discipline');



/**                                                           EvaluationController                                       
 *                  
 *                                                                   NOTES     
 *                     TABLEAU DE BORD STATS DES NOTES     */
$app->get('/notetab', "ppe_gestion\Controller\EvaluationController::tabAction")->bind('notetab');
/** 
 *                             LISTE
 * route pour l'affichage de la liste des notes - evaluations
 */
$app->get('/notelist', "ppe_gestion\Controller\EvaluationController::listAction")->bind('notelist');
/**   
 *                             AJOUT

 *  Route pour l'ajout des notes et commentaires
 */
$app->get('/addnote',"ppe_gestion\Controller\EvaluationController::addIndexAction")->bind('addnote');
$app->post('/addnote', "ppe_gestion\Controller\EvaluationController::addAction")->bind('note');

/**                      STATISTIQUES
 * 
 * route pour afficher les stats des notes
 */
$app->get('/notestats',"ppe_gestion\Controller\EvaluationController::statAction")->bind('notestats');




/**                                                              EXAMEN
 * 
 *                          AJOUT
 */
$app->get('/addexam', "ppe_gestion\Controller\ExamenController::addIndexAction")->bind('exam');
$app->post('/addexam', "ppe_gestion\Controller\ExamenController::addAction")->bind('addexam');

/**                        LISTE
 *                           
 * route pour l'affichage de la liste des examens */
$app->get('/examlist',"ppe_gestion\Controller\ExamenController::listAction")->bind('examlist');




/**                                                             STATISTIQUES
 * 
 *                       TABLEAU DE BORD
 * 
 * 
 * route pour afficher un tableau de bord de toutes les statistiques 
 */
$app->get('/stattab', function () use ($app) {
    return $app['twig']->render('TabTemplate/stattab.html.twig');
})->bind('stattab');










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






