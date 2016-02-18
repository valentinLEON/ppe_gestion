<?php

// Page d'accueil
/*$app->get('/', function () use ($app) {
    $discipline = $app['dao.discipline']->findAll();
    return $app['twig']->render('index.html.twig', array('matieres' => $discipline)); //
});*/

$app->get('/', function () use ($app) {
    $classes = $app['dao.class']->findAll();
    return $app['twig']->render('index.html.twig', array('classNames' => $classes)); //
});