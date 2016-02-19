<?php

use Symfony\Component\HttpFoundation\Request;

//route pour le formulaire d'ajout de note
$app->get('/', function () use ($app) {
    $classes = $app['dao.className']->findAll();
    $discipline = $app['dao.discipline']->findAll();
    $etudiant = $app['dao.student']->findall();
    return $app['twig']->render('index.html.twig', array(
        'classNames' => $classes,
        'matieres' => $discipline,
        'student' => $etudiant)); //
});

$app->get('/addstudent',function(Request $request) use ($app) {
    return $app['twig']->render('addstudent.html.twig', array() );
})->bind('addstudent');