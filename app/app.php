<?php
namespace ppe_project_gestion;

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
use Silex\ControllerProviderInterface;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());


class AppController implements ControllerProviderInterface {
 
     public function connect(Application $app) {
      $factory=$app['controllers_factory'];
      // Routes are defined here
      $factory->get('/','App\AppController::home');
      return $factory;
    }
     
    public function home() {
      return 'Hello world';
    }
}

// Register services.
$app['dao.student'] = $app->share(function ($app) {
    return new ppe_project_gestion\DAO\studentDAO($app['db']);
});

return $app;

