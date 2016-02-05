<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 04/02/2016
 * Time: 14:36
 */

//TODO: regarder test d'affichage
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

require_once __DIR__ . '/../app/app.php';

$app->run();