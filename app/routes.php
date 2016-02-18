<?php

// Page d'accueil
$app->get('/', function () use ($app) {
    $classes = $app['dao.discipline']->findAll();
    return $app['twig']->render('index.html.twig', array('$_classNames' => $classes)); //
});