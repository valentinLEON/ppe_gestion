<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 04/02/2016
 * Time: 14:36
 */
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
    return 'Hello world';
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});

$app->run();