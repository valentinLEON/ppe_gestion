<?php

use Symfony\Component\HttpFoundation\Request;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Form\Type\addNoteForm;

/**
 * TODO: faire les routes pour afficher les listes des datas
 */

/**
 * Route pour l'accueil
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});


/**
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/admintab', function () use ($app) {
    return $app['twig']->render('TabTemplate/admintab.html.twig');
})->bind('admintab');


/**
 * route pour l'affichage de la gestion des etudiants
 */
$app->get('/studenttab', function () use ($app) {
    return $app['twig']->render('TabTemplate/studenttab.html.twig');
})->bind('studenttab');



/**
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/studentslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/studentslist.html.twig');
})->bind('studentslist');

/**
 * route pour l'ajout des étudiants
 */
$app->get('/addstudent', function () use ($app) {
    return $app['twig']->render('FormTemplate/addstudent.html.twig');
})->bind('addstudent');

/**
 * route pour l'affichage de la liste des etudiants
 */
$app->get('/studentstats', function () use ($app) {
    return $app['twig']->render('StatTemplate/studentstats.html.twig');
})->bind('studentstats');

/**
 * route pour l'affichage de la liste des utilisateurs
 */
$app->get('/userslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/userslist.html.twig');
})->bind('userslist');

/**
 * route pour l'ajout des utilisateurs
 */
$app->get('/adduser', function () use ($app) {
    return $app['twig']->render('FormTemplate/adduser.html.twig');
})->bind('adduser');

/**
 * route pour afficher le calendrier
 */
$app->get('/calendar', function () use ($app) {
    //$eval = $app['dao.evaluation']->findAllByDiscipline(1);
    return $app['twig']->render('calendar.html.twig');
})->bind('calendar');

/**
 * route pour afficher le login
 */
$app->get('/login', function (Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error' => $app['security.last.error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');

/**
 * route pour l'affichage de la liste des classes
 */
$app->get('/classeslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/classeslist.html.twig');
})->bind('classeslist');

/**
 * route pour l'ajout des classes
 */
$app->match('/addclass', function () use ($app) {
    return $app['twig']->render('FormTemplate/addclass.html.twig');
})->bind('addclass');


/**
 * route pour l'affichage de la liste des disciplines
 */
$app->get('/disciplineslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/disciplineslist.html.twig');
})->bind('disciplineslist');

/**
 * route pour l'ajout des matières
 */
$app->get('/adddiscipline', function () use ($app) {
    return $app['twig']->render('FormTemplate/adddiscipline.html.twig');
})->bind('adddiscipline');


/**
 * route pour afficher les stats des notes
 */
$app->get('/notestats', function () use ($app) {
    return $app['twig']->render('StatTemplate/notestats.html.twig');
})->bind('notestats');


/**
 * Route pour l'ajout des notes
 */

$app->get('/addnote', function () use ($app) {
    return $app['twig']->render('FormTemplate/addnote.html.twig');
})->bind('addnote');

$app->match('/addnote',function(Request $request) use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $etudiant = $app['dao.student']->findall();

    $noteFormView = null;

    $note = new Evaluation();
    $noteForm = $app['form.factory']->create(new addNoteForm(), $note);
    $noteForm->handleRequest($request);
    if($noteForm->isSubmitted() && $noteForm->isValid())
    {
        $app['dao.evaluation']->save($note);
    }
    // noteFormView n'est pas bien utilise
    $noteFormView = $noteForm->createView();
    return $app['twig']->render('FormTemplate/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant));
});




/**
 * route pour l'affichage du tableaud de bord des abscences
 */
$app->get('/abscencetab', function () use ($app) {
    return $app['twig']->render('TabTemplate/abscencetab.html.twig');
})->bind('abscencetab');


/**
 * route pour l'ajout de retard
 */
$app->get('/addretard', function () use ($app) {
    return $app['twig']->render('FormTemplate/addretard.html.twig');
})->bind('addretard');


/**
 * route pour l'ajout d abscence
 */
$app->get('/addabscence', function () use ($app) {
    return $app['twig']->render('FormTemplate/addabscence.html.twig');
})->bind('addabscence');

/**
 * route pour l'affichage de la liste des  retards
 */
$app->get('/retardslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/retardslist.html.twig');
})->bind('retardslist');


/**
 * route pour l'affichage de la liste desabscences
 */
$app->get('/abscenceslist', function () use ($app) {
    return $app['twig']->render('ListTemplate/abscenceslist.html.twig');
})->bind('abscenceslist');

