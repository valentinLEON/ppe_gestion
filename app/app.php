
<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\ControllerProviderInterface;

use ppe_project_gestion\DAO\ClassNameDAO;

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

$app['dao.class'] = $app->share(function($app){
    return new ClassNameDAO($app['db']);
});

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
return $app;
