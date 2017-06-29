<?php

namespace App\Services;

interface ServiceInterface
{
    public function getMessage();
    public function setMessage($message);
    public function getStatus();
    public function setStatus($status);
}