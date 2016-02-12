<?php

// Home page
$app->get('/', function () use ($app) {
    //$students = $app['dao.student']->findAll();

    //require '../views/students.php';
    return $app['twig']->render('index.html.twig', array());
});