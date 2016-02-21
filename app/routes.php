<?php

use Symfony\Component\HttpFoundation\Request;

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
    return $app['twig']->render('addstudent.html.twig');
})->bind('addstudent');

/**
 * route pour l'ajout des utilisateurs
 */
$app->get('/adduser', function () use ($app) {
    return $app['twig']->render('adduser.html.twig');
})->bind('adduser');

/**
 * route pour afficher le calendrier
 */
$app->get('/calendar', function () use ($app) {
    return $app['twig']->render('calendar.html.twig');
})->bind('calendar');

/**
 * route pour afficher le login
 */
$app->get('/login', function () use ($app) {
    return $app['twig']->render('login.html.twig');
})->bind('login');

/**
 * route pour l'ajout des classes
 */
$app->get('/addclass', function () use ($app) {
    return $app['twig']->render('addclass.html.twig');
})->bind('addclass');

/**
 * Route pour l'ajout des notes
 */
$app->get('/addnote',function() use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $etudiant = $app['dao.student']->findall();
    return $app['twig']->render('addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant));
})->bind('addnote');