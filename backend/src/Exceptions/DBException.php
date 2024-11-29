<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Exceptions;

class DBException extends \Exception
{

    public $message = 'A database error occurred';
}