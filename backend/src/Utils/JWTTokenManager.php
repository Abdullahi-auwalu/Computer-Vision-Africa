<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Utils;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTTokenManager
{

    public function __construct(
        private string $secretKey
    )
    {

    }

    public function generateJWT(string $userId): string
    {
        $domain = $_ENV['SERVER_DOMAIN'];

        $payload = [
            'iss' => $domain,           // Issuer
            'aud' => $domain,           // Audience
            'iat' => time(),            // Issued at
            'exp' => time() + 3600,     // Expiry time (1 hour)
            'uid' => $userId            // User ID
        ];

        return JWT::encode($payload, $this->secretKey, 'HS256');
    }

    public function verifyJWT(string $jwt): ?array
    {
        try {
            $decoded = JWT::decode($jwt, new Key($this->secretKey, 'HS256'));
            return (array) $decoded;
        } catch (\Exception $e) {
            // Token is invalid
            return null; 
        }
    }
}