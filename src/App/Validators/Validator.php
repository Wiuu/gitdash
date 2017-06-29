<?php

namespace App\Validators;

use Silex\Application;
use Symfony\Component\Validator\Constraints as Assert;

abstract class Validator
{
    protected $errorMessage = array();
    protected $status;


    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }




    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage[] = $errorMessage;
    }
}