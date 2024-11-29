<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Models;

use FranklinEkemezie\ComputerVisionAfrica\Entities\User;

class UserModel extends BaseModel
{

    private static function createUserFrom(array $userInfo, bool $hashPassword=false): User
    {
        return new User(
            $userInfo['uid'],
            $userInfo['firstname'] ?? null,
            $userInfo['lastname'] ?? null,
            $userInfo['username'],
            $userInfo['email'],
            $userInfo['password'],
            $hashPassword
        );
    }

    /**
     * Register a user
     * @param \FranklinEkemezie\ComputerVisionAfrica\Entities\User $user
     * @return int|null|false
     */
    public function register(User $user): int|null
    {
        
        return $this->db->insert('users', [
            'uid'       => $user->uid,
            'firstname' => $user->firstname,
            'lastname'  => $user->lastname,
            'username'  => $user->username,
            'email'     => $user->email,
            'password'  => $user->password,
        ]);

    }

    public function getUserWhose(
        ?string $uid=null,
        ?string $firstname=null,
        ?string $lastname=null,
        ?string $username=null,
        ?string $email=null,
        ?string $password=null,
    ): ?User
    {

        // Get the user info
        $userInfo = [
            'uid'       => $uid,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'username'  => $username,
            'email'     => $email,
            'password'  => $password
        ];

        // Filter out the fields not given
        $userInfo = array_filter($userInfo, function ($data, $field) {
            return ! ($data === null);
        }, ARRAY_FILTER_USE_BOTH);

        $userSelectInfo =  $this->db->select('users', $userInfo);

        return ! ($userSelectInfo === null) ? 
            static::createUserFrom($userSelectInfo) :
            null
        ;
    }

    public function getUserWithUID(string $uid): ?User
    {
        return $this->getUserWhose(uid: $uid);
    }
}