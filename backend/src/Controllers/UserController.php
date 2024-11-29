<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Controllers;

use FranklinEkemezie\ComputerVisionAfrica\Entities\User;
use FranklinEkemezie\ComputerVisionAfrica\Enums\StatusCode;
use FranklinEkemezie\ComputerVisionAfrica\Models\UserModel;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;

class UserController extends BaseController
{

    /**
     * Get the user UID for authenticated user making the request
     * @return string
     */
    public function getUserUID(): ?string
    {
        $jwtAuthToken = $this->request->getAuthToken();
        $jwtPayload = $this->jwtTokenManger->verifyJWT($jwtAuthToken);

        if (! $jwtPayload) return null;
        return $jwtPayload['uid'] ?? null;
    }

    /**
     * Get the authenticated user making the request
     * @return \FranklinEkemezie\ComputerVisionAfrica\Entities\User
     */
    public function getUser():  ?User
    {

        $userUID = $this->getUserUID();
        $user = (new UserModel($this->config->db))->getUserWithUID($userUID);
        if(! $user) return null;

        return $user;
    }

    public function getProfile(): Response
    {
        $user = $this->getUser();
        $userProfileInfo = [
            'uid'       => $user->uid,
            'firstname' => $user->firstname,
            'lastname'  => $user->lastname,
            'username'  => $user->username,
            'email'     => $user->email
        ];

        $response = Response::prepareJSONSuccess("Profile retrieved successfully", $userProfileInfo);
        return Response::prepareResponse(StatusCode::_200->value, $response);
    }

    public function editProfile(): Response
    {
        // Get user
        $userUID = $this->getUserUID();

        return Response::prepareResponse(StatusCode::_200->value, "Editing profile with UID: {$userUID}... Please wait");
    }
}