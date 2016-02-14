<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
//use Symfony\Component\HttpFoundation\Request;
//use Silex\Application;
//use Silex\ControllerProviderInterface;

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));


// Register services.
/*$app['dao.className'] = $app->share(function ($app) {
    return new ppe_project_gestion\DAO\ClassNameDAO($app['db']);
});*/

return $app;

