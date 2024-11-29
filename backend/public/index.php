<?php

declare(strict_types=1);

use FranklinEkemezie\ComputerVisionAfrica\Core\App;
use FranklinEkemezie\ComputerVisionAfrica\Core\Router;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Config;
use FranklinEkemezie\ComputerVisionAfrica\Utils\EnvManager;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Logger;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Request;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Session;

// Include Composer autoload
require dirname(__DIR__) . "/vendor/autoload.php";

// Define document root
define('DOCUMENT_ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// Include necessary
require DOCUMENT_ROOT . 'bootstrap' . DIRECTORY_SEPARATOR . 'constants.php';
require BOOTSTRAP_FOLDER . 'helpers.php';

// Start session
Session::init();

// Load the environment variables
EnvManager::loadEnv(DOCUMENT_ROOT . '.env');

// Set up application
$routes     = getJSONFromFile(APP_ROOT . 'routes.json') ?? [];

$router     = new Router();
$request    = new Request();
$config     = new Config($_ENV);
$logger     = new Logger();


try {
    $response = (new App($router, $config))
        ->run($routes, $request);

    echo $response;

} catch (\Throwable $e) {

    $error = <<<LOG
    Message:    {$e->getMessage()}
    Code:       {$e->getCode()}
    File:       {$e->getFile()}:{$e->getLine()}
    Trace:      {$e->getTraceAsString()}
    LOG;
    
    // Log the error in a single file for now
    file_put_contents(LOGS_DIR . 'error.log',$error);

    // Send response
    http_response_code(500);
    header("Content-Type: appliation/json");

    echo json_encode([
        'status'    => 'error',
        'message'   => 'An internal error occurred'
    ]);

}

// Unrelated
//  C:\Users\FRANKLIN\AppData\Local\Temp\chocolatey\chocoInstall\chocolatey.zip