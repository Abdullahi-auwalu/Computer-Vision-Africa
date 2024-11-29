<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Core;

use FranklinEkemezie\ComputerVisionAfrica\Enums\StatusCode;
use FranklinEkemezie\ComputerVisionAfrica\Middlewares\AuthMiddleware;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Config;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Request;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;

class App
{

    public function __construct(
        private Router $router,
        private Config $config
    )
    {

    }

    public function run(array $routes, Request $request): Response
    {

        // Get the Controller method handler for the request
        $routeHandler = $this->router
            ->register($routes)
            ->route($request, $this->config)
        ;
        
        // Hande authentication
        $authResponse = (new AuthMiddleware($routes))->handle($request);
        if (! $authResponse) {
            $response = new Response(StatusCode::_401->value, json_encode([
                'status'    => 'error',
                'error'     => 'Authentication required',
                'message'   => 'User must be logged in'
            ]));

            return $response;
        }

        // Get the response
        try {

            /** @var Response $response */
            $response = $routeHandler();

        } catch(\FranklinEkemezie\ComputerVisionAfrica\Exceptions\DBException $e) {
            throw new \FranklinEkemezie\ComputerVisionAfrica\Exceptions\DBException($e->getMessage(), (int) $e->getCode());
        } catch (\Exception $e) {
            throw new \FranklinEkemezie\ComputerVisionAfrica\Exceptions\ControllerException($e->getMessage(), (int) $e->getCode());
        }
        
        return $response;
    }
}