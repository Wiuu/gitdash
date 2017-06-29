<?php

$app->register(
    new \Kurl\Silex\Provider\DoctrineMigrationsProvider(),
    array(
        'migrations.directory' => __DIR__ . '/../../migrations',
        'migrations.namespace' => 'Acme\Migrations',
    )
);
