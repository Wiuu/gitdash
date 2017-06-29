<?php

namespace App\Services;

use Silex\Application;

abstract class Service
{
    private $app;

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Application $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    public function __construct(Application $app)
    {
        $this->setApp($app);
    }
}