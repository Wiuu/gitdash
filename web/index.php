<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

$app = include __DIR__ . '/../resources/config/bootstrap.php';
date_default_timezone_set('UTC'); // default timezone to mongo date

$app->run();
