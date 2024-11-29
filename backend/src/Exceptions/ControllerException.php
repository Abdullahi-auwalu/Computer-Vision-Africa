<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Exceptions;

class ControllerException extends \Exception
{
    protected $message = 'A controller error occurred';
}