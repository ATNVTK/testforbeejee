<?php


use Spiral\Database;
use core\Application;
require __DIR__ . '/core/Application.php';
require __DIR__ . '/core/Request.php';
require __DIR__ . '/vendor/autoload.php';


$test = Application::get_app();
$app = $test->run();

?>

