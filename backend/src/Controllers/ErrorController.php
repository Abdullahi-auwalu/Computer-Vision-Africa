<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Controllers;

use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;

class ErrorController
{
    
    public static function notFound(): Response
    {
        return new Response(404, "Not Found");
    }

    public static function internalError(): Response
    {
        return new Response(500, "An internal error occurred");
    }
}