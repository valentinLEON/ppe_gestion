<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 21:07
 */

//paramétrage de la connexion à la base de données avec l'orm DBAL
$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'groupe_sio2',
    'user' => 'root',
    'password' => '', //ce qui n'est pas forcément sécurisé !
);