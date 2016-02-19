<?php

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