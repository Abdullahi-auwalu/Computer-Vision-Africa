<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Middlewares;

use FranklinEkemezie\ComputerVisionAfrica\Utils\Request;

class AuthMiddleware extends BaseMiddleware
{

    public function __construct(private array $routes)
    {

    }

    /**
     * Handles the authentication
     * 
     * @param \FranklinEkemezie\ComputerVisionAfrica\Utils\Request $request
     * @return bool Returns TRUE if the request passes authentication, otherwise FALSE
     */
    public function handle(Request $request): bool
    {

        $path = $request->path;
        $method = $request->method;

        $authInfo = $this->routes[$path][$method]['auth'] ?? null;

        // If auth info is not provided (authentication is not neccessary)
        if ($authInfo === null) {
            return true;
        }

        [$authRequired, ] = $authInfo;
        
        // If authentication is required, but not provided
        if ($authRequired && ! $request->isAuth()) {
            return false;
        }

        return true;
    }
}