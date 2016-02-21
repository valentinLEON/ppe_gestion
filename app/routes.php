<?php

use Symfony\Component\HttpFoundation\Request;

/**
 * Route pour l'accueil
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});

//route pour le formulaire d'ajout de note
$app->get('/', function () use ($app) {
    return $app['twig']->render('addnote.html.twig');
});

/**
 * route pour l'ajout des étudiants
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('addstudent.html.twig');
});

/**
 * route pour l'ajout des utilisateurs
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('adduser.html.twig');
});

/**
 * route pour afficher le calendrier
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('calendar.html.twig');
});

/**
 * route pour afficher le login
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('login.html.twig');
});

$app->get('/addnote',function() use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $etudiant = $app['dao.student']->findall();
    return $app['twig']->render('addnote.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant));
})->bind('addnote');