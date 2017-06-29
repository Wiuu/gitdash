<?php

try {
    $collections = [
        'session'
    ];

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");


    foreach ($collections as $col) {
        $mng->executeCommand('livesession', new \MongoDB\Driver\Command(["drop" => $col]));
        echo 'Done Deleted: '.$col.'<br>';
    }


} catch (MongoDB\Driver\Exception\Exception $e) {
    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}
