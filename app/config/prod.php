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
    'host' => '162.243.111.161',
    'port' => '8082',
    'dbname' => 'groupe_sio2',
    'user' => 'groupe_sio2',
    'password' => 'groupe_sio2', //ce qui n'est pas forcément sécurisé !
);