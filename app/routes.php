<?php

// Page d'accueil
/*$app->get('/', function () use ($app) {
    $discipline = $app['dao.discipline']->findAll();
    return $app['twig']->render('index.html.twig', array('matieres' => $discipline)); //
});*/

$app->get('/', function () use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $student = $app['dao.student']->findall();
    return $app['twig']->render('index.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $student)); //
});