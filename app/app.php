
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
use ppe_gestion\DAO\DisciplineDAO;
use ppe_gestion\Domain;


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();


$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/twig/twig/lib',
));

$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

//Service pour l'authentification
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => $app->share(function () use($app){
                return new ppe_gestion\DAO\UserDAO($app['db']);
            }),
        ),
    ),
));

// Provider pour générer des formulaires
//$app->register(new Silex\Provider\FormServiceProvider());

/**
 * Provider pour la génération des urls
 *
 */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Provider pour gérer les differents languages
$app->register(new Silex\Provider\TranslationServiceProvider());




//                                                        CONTROLLERS
/**
 * controller pour la route des matières
 */
$app['dao.discipline'] = $app->share(function($app){
    return new DisciplineDAO($app['db']);
});

/**
 * Controller pour la route des classes
 *
 */
$app['dao.classNames'] = $app->share(function($app){
    return new ppe_gestion\DAO\ClassNameDAO($app['db']);

});

/**
 * Controller pour la route des étudiants
 *
 */
$app['dao.student'] = $app->share(function($app){
    $studentDAO = new ppe_gestion\DAO\StudentDAO($app['db']);
    $studentDAO->setClassDAO($app['dao.classNames']);

    return $studentDAO;
});

/**
 * Controller pour la route des examens
 */
$app['dao.examen'] = $app->share(function($app){
    return new ppe_gestion\DAO\ExamenDAO($app['db']);
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

/*$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'foo' => array('pattern' => '^/login'), // Exemple d'une url accessible en mode non connecté
        'default' => array(
            'pattern' => '^.*$',
            'anonymous' => true, // Indispensable car la zone de login se trouve dans la zone sécurisée (tout le front-office)
            'form' => array('login_path' => '/', 'check_path' => 'connexion'),
            'logout' => array('logout_path' => '/deconnexion'), // url à appeler pour se déconnecter
            'users' => $app->share(function() use ($app) {
                // La classe App\User\UserProvider est spécifique à notre application et est décrite plus bas
                return new App\User\UserProvider($app['db']);
            }),
        ),
    ),
    'security.access_rules' => array(
        // ROLE_USER est défini arbitrairement, vous pouvez le remplacer par le nom que vous voulez
        array('^/.+$', 'ROLE_USER'),
        array('^/foo$', ''), // Cette url est accessible en mode non connecté
    )
));*/
            
            
            
return $app;