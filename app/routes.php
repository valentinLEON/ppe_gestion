<?php

// Page d'accueil
$app->get('/', function () use ($app) {
    $classes = $app['dao.class']->findAll();
    return $app['twig']->render('index.html.twig', array('$_classNames' => $classes)); //
});