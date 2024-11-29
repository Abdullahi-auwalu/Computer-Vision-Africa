<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Entities;

/**
 * @property-read string $uid
 * @property-read string $username
 * @property-read string $email
 */

class User
{

    private string $password;

    public function __construct(
        private string $uid,
        private ?string $firstname=null,
        private ?string $lastname=null,
        private string $username,
        private string $email,
        string $password,
        bool $hashPassword=true
    )
    {
        
        $this->password = $hashPassword ? User::hashPassword($password) : $password;
    }

    private static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    public static function generateUID(): string
    {
        return bin2hex(random_bytes(16));
    }

    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new \Exception('Cannont access non-existing property ' . __CLASS__ . '::$' . $name);
    }
}