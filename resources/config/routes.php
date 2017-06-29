<?php

$app['annot.controllers'] = array(
    App\Controllers\LiveSession\LiveSession::class,
);

$app->register(new DDesrosiers\SilexAnnotations\AnnotationServiceProvider(), array(
    'annot.controllerDir' => realpath('./src/Controllers'),
));
