<?php

namespace ppe_project_gestion;

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());

// Register services.
$app['dao.student'] = $app->share(function ($app) {
    return new ppe_project_gestion\DAO\studentDAO($app['db']);
});