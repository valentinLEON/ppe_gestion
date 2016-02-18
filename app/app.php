
<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

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

//Controller que la route appellera pour afficher les matières à Twig
$app['dao.discipline'] = $app->share(function($app){
    return new ppe_gestion\DAO\DisciplineDAO($app['db']);
});

$app['dao.class'] = $app->share(function($app){
    return new ppe_gestion\DAO\ClassNameDAO($app['db']);
});

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
return $app;
