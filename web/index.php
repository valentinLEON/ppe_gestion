<?php

require_once __DIR__.'/../vendor/autoload.php';


$app = new ppe_gestion\PPEgestionApp();

require __DIR__.'/../app/config/dev.php';

require __DIR__.'/../app/app.php';

require __DIR__.'/../app/routes.php';

 
$app->run();