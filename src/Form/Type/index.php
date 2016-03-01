<?php // index.php
use Acme\Form\Type\ExampleForm;
use Silex\Application;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\HttpFoundation\Request;

require_once 'vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

$app->register(new TranslationServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new TwigServiceProvider(), array('twig.path' => __DIR__ . '/templates'));

$app->match('/', function(Request $request) use($app){
    $form = $app['form.factory']->create(new ExampleForm());

    $form->handleRequest($request);

    if($form->isValid()) {
        return 'VALID';
    }

    return $app['twig']->render('home.twig', array(
        'form' => $form->createView()
    ));
});

$app->run();