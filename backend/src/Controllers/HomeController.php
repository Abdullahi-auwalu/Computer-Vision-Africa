<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Controllers;

use FranklinEkemezie\ComputerVisionAfrica\Enums\StatusCode;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;

class HomeController extends BaseController
{

    public function index(): Response
    {
        $response = Response::prepareJSONSuccess('Welcome to Computer Vision Africa');
        return Response::prepareResponse(StatusCode::_200->value, $response);
    }
}