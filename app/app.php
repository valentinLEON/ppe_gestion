
<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Provider\FormServiceProvider;

use Silex\Application;

use ppe_gestion\DAO;
use ppe_gestion\Domain;


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/twig/twig/lib',
    'twig.options' => array(),
));

//controller pour les générations de formulaires
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

/**
 * Provider pour la génération des urls
 *
 */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/**
 * controller pour la route des matières
 */
$app['dao.discipline'] = $app->share(function($app){
    return new ppe_gestion\DAO\DisciplineDAO($app['db']);
});

/**
 * Controller pour la route des classes
 *
 */
$app['dao.className'] = $app->share(function($app){
    return new ppe_gestion\DAO\ClassNameDAO($app['db']);
});

/**
 * Controller pour la route des étudiants
 *
 */
$app['dao.student'] = $app->share(function($app){
    return new ppe_gestion\DAO\StudentDAO($app['db']);
});

/**
 * Controller pour la route des notes
 */
$app['dao.evaluation'] = $app->share(function($app){
    $evaluationDAO = new ppe_gestion\DAO\EvaluationDAO($app['db']);
    $evaluationDAO->setStudentDAO($app['dao.student']);
    $evaluationDAO->setDisciplineDAO($app['dao.discipline']);
    return $evaluationDAO;
});

/**
 * Controller pour la route des utilisateurs
 * TODO: A changer plus tard pour la concordance.
 */
$app['dao.users'] = $app->share(function($app){
    return new ppe_gestion\DAO\UserDAO($app['db']);
});

return $app;
