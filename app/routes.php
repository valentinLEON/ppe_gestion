<?php

use Symfony\Component\HttpFoundation\Request;
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
 * route pour l'ajout des étudiants
 */
$app->get('/addstudent', function () use ($app) {
    return $app['twig']->render('Formulaires/addstudent.html.twig');
})->bind('addstudent');

/**
 * route pour l'ajout des utilisateurs
 */
$app->get('/adduser', function () use ($app) {
    return $app['twig']->render('Formulaires/adduser.html.twig');
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
    return $app['twig']->render('classeslist.twig');
})->bind('classeslist');

/**
 * route pour l'ajout des classes
 */
$app->match('/addclass', function () use ($app) {
    return $app['twig']->render('Formulaires/addclass.html.twig');
})->bind('addclass');

/**
 * route pour l'ajout des matières
 */
$app->get('/adddiscipline', function () use ($app) {
    return $app['twig']->render('Formulaires/adddiscipline.html.twig');
})->bind('adddiscipline');

/**
 * Route pour l'ajout des notes
 */
$app->match('/addnote',function(Request $request) use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $etudiant = $app['dao.student']->findall();
    $noteFormView = null;
    $note = new \ppe_gestion\Domain\Evaluation();
    $noteForm = $app['form.factory']->create(new addNoteForm(), $note);
    $noteForm->handleRequest($request);
    if($noteForm->isSubmitted() && $noteForm->isValid())
    {
        $app['dao.evaluation']->save($note);
    }
    // noteFormView n'est pas bien utilise
    $noteFormView = $noteForm->createView();
    return $app['twig']->render('Formulaires/addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant));
})->bind('addnote');