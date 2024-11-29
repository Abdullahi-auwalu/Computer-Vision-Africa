<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Utils;

/**
 * @property-read string $method
 * @property-read string $path
 * @property-read string $httpVersion
 */

class Request
{
    private string $method;
    private string $path;
    private string $httpVersion;
    private Header $header;
    private array $POST;
    private array $GET;
    private array $SERVER;

    public const REQUEST_METHODS = ['GET', 'POST'];
    
    public function __construct()
    {
        $this->method       = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $this->path         = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->httpVersion  = $_SERVER['SERVER_PROTOCOL'];
        $this->POST = array_map(fn($input) => FormValidator::sanitiseData($input), $_POST);
        $this->GET  = array_map(fn($input) => FormValidator::sanitiseData($input), $_GET);
        $this->SERVER = $_SERVER;
    }

    public function isAuth(): bool
    {
        $jwtAuthToken = $this->getAuthToken();
        if ($jwtAuthToken === null) {
            return false;
        }

        return (new JWTTokenManager($_ENV['JWT_SECRET_KEY']))->verifyJWT($jwtAuthToken) !== null;
    }

    public function getAuthToken(): ?string
    {
        if (! ($httpAuth = $this->SERVER['HTTP_AUTHORIZATION'] ?? null)) {
            return null;
        }
        
        $token = str_replace('Bearer', '', $httpAuth);

        // Check if token is blacklist
        $jwtBlacklist = Session::get('jwt_blacklist') ?? [];
        if (in_array($token, $jwtBlacklist)) {
            return null;
        }

        return $token;
    }


    public function __get(string $name): mixed
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new \Exception('Cannot access non-existing property ' . __CLASS__ . '::$' . $name);
    }
}