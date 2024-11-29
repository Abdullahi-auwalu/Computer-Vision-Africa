<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Middlewares;

use FranklinEkemezie\ComputerVisionAfrica\Utils\Request;

abstract class BaseMiddleware
{

    abstract public function handle(
        Request $request
    ): mixed;
}



