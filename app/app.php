
<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 05/02/2016
 * Time: 09:09
 */
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
//use Silex\Provider\FormServiceProvider;
//use Silex\Provider;
use Silex\Application;

use ppe_gestion\DAO;
use ppe_gestion\Domain;


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());

// Provider pour générer des sessions
//$app->register(new Silex\Provider\SessionServiceProvider(), array(
//    
//    
//        'error'         => $app['security.last_error']($request),
//
//        'last_username' => $app['session']->get('_security.last_username'),
//    
//));


$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/twig/twig/lib',
    'twig.options' => array(),
));

// Provider pour générer des formulaires
$app->register(new Silex\Provider\FormServiceProvider());

/**
 * Provider pour la génération des urls
 *
 */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Provider pour gérer les differents languages
$app->register(new Silex\Provider\TranslationServiceProvider());


// Provider pour gérer le login
$app->register(new Silex\Provider\SecurityServiceProvider(), array(

    'security.firewalls' => array(

        'secured' => array(

            'pattern' => '^/',

            'anonymous' => true,

            'logout' => true,

            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),

            'users' => $app->share(function () use ($app) {

                return new ppe_gestion\DAO\UserDAO($app['db']);

            }),

        ),

    ),
));
            
//                                                        CONTROLLERS
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

















//Monolog
// $app->register(new Provider\MonologServiceProvider(), array(
    // 'monolog.logfile' => __DIR__ . '/../log/development.log',
    // 'monolog.name'    => 'ppe_gestion'
// ));

// Web Profiler
// if ($app['debug']) {
    // $app->register(new Provider\WebProfilerServiceProvider(), array(
        // 'profiler.cache_dir' => __DIR__.'/../cache/profiler/',
        // 'profiler.mount_prefix' => '/_profiler', // this is the default
    // ));    
// }


// Register JSON data decoder for JSON requests
// $app->before(function (Request $request) {
    // if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        // $data = json_decode($request->getContent(), true);
        // $request->request->replace(is_array($data) ? $data : array());
    // }
// });

