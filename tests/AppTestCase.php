<?php

use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class AppTestCase extends WebTestCase
{
    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    
    private $entityManager;

    public function createApplication()
    {
        $app = require __DIR__ . '/../resources/config/bootstrap.php';

        $app["db.options"] = [
            "driver" => 'pdo_sqlite',
            "path" => __DIR__ . 'Files/sqlite.db',
            "memory" => false,
        ];

        return $app;
    }
}
