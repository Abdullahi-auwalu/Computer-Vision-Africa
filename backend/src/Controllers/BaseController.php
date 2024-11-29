<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Controllers;

use FranklinEkemezie\ComputerVisionAfrica\Utils\Config;
use FranklinEkemezie\ComputerVisionAfrica\Utils\JWTTokenManager;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Request;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Session;

abstract class BaseController {

    protected Session $session;
    protected JWTTokenManager $jwtTokenManger;

    public function __construct(
        protected Request $request,
        protected Config $config
    )
    {
        // Set up session
        $this->session = new Session();

        // Set up JWT Token manager
        $this->jwtTokenManger = new JWTTokenManager($_ENV['JWT_SECRET_KEY']);

    }
}