<?php

// Home page
$app->get('/', function () use ($app) {
    $students = $app['dao.student']->findAll();

    ob_start();             // start buffering HTML output
    require '../views/students.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});