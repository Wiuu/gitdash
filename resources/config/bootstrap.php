<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application();

$dotenv = new \Dotenv\Dotenv(realpath(__DIR__ . '/../../'), '.env');
$dotenv->load();

require_once __DIR__ . '/../../resources/config/middleware.php';
require_once __DIR__ . '/../../resources/config/log.php';
require_once __DIR__ . '/../../resources/config/routes.php';
require_once __DIR__ . '/../../resources/config/database.php';
require_once __DIR__ . '/../../resources/config/swagger.php';
require_once __DIR__ . '/../../resources/config/migration.php';


$app->register(new \Euskadi31\Silex\Provider\CorsServiceProvider());

$app->register(new ServiceControllerServiceProvider());

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new MonologServiceProvider(), array(
    "monolog.logfile" => __DIR__ . '/../../storage/logs/' . (new \DateTime())->format("Y-m-d") . ".log",
    "monolog.level" => getenv('DEBUG') ? Monolog\Logger::DEBUG : Monolog\Logger::ERROR,
    "monolog.name" => getenv('APP_NAME'),
));

$app['swiftmailer.options'] = array(
    'host' => getenv('EMAIL_HOST'),
    'port' => '587',
    //'port' => getenv('EMAIL_PORT'),
    'username' => getenv('EMAIL_USER'),
    'password' => getenv('EMAIL_PASSWORD'),
    'encryption' => 'tls',
    'auth_mode' => null
);

$app->error(function (\Exception $e, $code) use ($app) {
    $app['monolog']->addError($e->getMessage());
    $app['monolog']->addError($e->getTraceAsString());
    return new JsonResponse(array("statusCode" => $code, "message" => $e->getMessage(), "stacktrace" => $e->getTraceAsString()));
});



return $app;
