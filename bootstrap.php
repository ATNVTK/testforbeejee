<?php
// bootstrap.php

use Cycle\Bootstrap;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once "vendor/autoload.php";

AnnotationRegistry::registerLoader('class_exists');

// single database
$config = Bootstrap\Config::forDatabase(
    'mysql:host=127.0.0.1;dbname=test', // connection dsn
    'root',                   // username
    '12345678'                    // password
);

// $config = Bootstrap\Config::forDatabase(
//    'mysql:host=127.0.0.1;dbname=database', // connection dsn
//    'mysql',                                // username
//    'mysql'                                 // password
// );

// which directory contains our entities
$config = $config->withEntityDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'models');

// log all SQL messages to STDERR
// $config = $config->withLogger(new Bootstrap\StderrLogger(true));

// enable schema cache (use /vendor/bin/cycle schema:update to flush cache), keep commented to disable caching
// $config = $config->withCacheDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'cache');

$orm = Bootstrap\Bootstrap::fromConfig($config);