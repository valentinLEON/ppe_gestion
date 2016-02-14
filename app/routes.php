<?php

// Page d'accueil
$app->get('/', function () use ($app) {
    //$classes = $app['dao.className']->findAll();
    return $app['twig']->render('index.html.twig', array()); //'classroom' => $classes
});