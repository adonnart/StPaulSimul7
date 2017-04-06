<?php
/**
 * Created by PhpStorm.
 * User: ANNICK
 * Date: 24/02/2016
 * Time: 16:05
 */

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => 'localhost',
    'port'     => '3306',
    'dbname'   => 'bdstpaul',
    'user'     => 'root',
    'password' => '',
);