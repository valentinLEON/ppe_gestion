<?php
<<<<<<< Updated upstream

namespace ppe_project_gestion;

=======
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */
>>>>>>> Stashed changes
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
<<<<<<< Updated upstream

// Register services.
$app['dao.student'] = $app->share(function ($app) {
    return new ppe_project_gestion\DAO\studentDAO($app['db']);
});

return $app;

