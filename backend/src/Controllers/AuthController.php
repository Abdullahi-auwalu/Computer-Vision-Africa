<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Controllers;

use FranklinEkemezie\ComputerVisionAfrica\Core\Database;
use FranklinEkemezie\ComputerVisionAfrica\Entities\User;
use FranklinEkemezie\ComputerVisionAfrica\Enums\StatusCode;
use FranklinEkemezie\ComputerVisionAfrica\Exceptions\DBException;
use FranklinEkemezie\ComputerVisionAfrica\Models\UserModel;
use FranklinEkemezie\ComputerVisionAfrica\Utils\FormValidator;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Response;
use FranklinEkemezie\ComputerVisionAfrica\Utils\Session;

class AuthController extends BaseController
{

    /**
     * Handles POST /auth/register
     * Registers a user
     * @return Response Returns the response for the user registration.
     * 
     */
    public function register(): Response
    {
        $responseArr = [];

        // Check if user is authenticated (logged in)
        if ($this->request->isAuth()) {
            $responseArr = Response::prepareJSONError("User is already logged in", null, null);
            return Response::prepareResponse(StatusCode::_403->value, $responseArr);
        }

        // Get form data
        $formData = $this->request->POST;
        $formData = [
            'username'  => [$formData['username'] ?? '', 'username'],
            'email'     => $formData['email'] ?? '',
            'password'  => $formData['password'] ?? '',
            'password-confirm'=> $formData['password-confirm'] ?? ''
        ];

        $formData['password-confirm'] = [
            $formData['password'],
            $formData['password-confirm']
        ];

        $validationResult = FormValidator::validateAll($formData);
        if (! empty($validationResult)) {
            $responseArr = Response::prepareJSONError('Validation failed', null, $validationResult);
            return Response::prepareResponse(StatusCode::_422->value, $responseArr);
        }

        // Create a User entity
        $user = new User(
            User::generateUID(),
            null,
            null,
            $formData['username'][0],
            $formData['email'],
            $formData['password'],
            true    // first time creating user, (hence hash password)
        );

        // Create a model
        $userModel = new UserModel($this->config->db);

        try {
            $userID = $userModel->register($user);
        } catch (DBException $e) {
            if ($e->getCode() === Database::ERROR_DUPLICATE_ENTRY) {
                preg_match("/for key '(.+)'/", $e->getMessage(), $matches);

                $violatedKey = $matches[1] ?? null;
                $violatedField = match ($violatedKey) {
                    'email' => 'Email address',
                    'username' => 'Username'
                };
                
                $responseArr = Response::prepareJSONError(
                    "User already registered",
                    $e->getCode(),
                    [
                        $violatedKey => "$violatedField is already registered"
                    ]
                );
                return Response::prepareResponse(StatusCode::_422->value, $responseArr);

            }

            $responseArr = Response::prepareJSONError("An unexpected error occurred", $e->getCode(), null);
            return Response::prepareResponse(400, $responseArr);
        }

        $responseArr = Response::prepareJSONSuccess('Registration successful', [
            'id'        => $userID,
            'uid'       => $user->uid,
            'username'  => $user->username
        ]);

        return Response::prepareResponse(StatusCode::_201->value, $responseArr);
    }

    public function login(): Response
    {
        // User must not be logged in
        if ($this->request->isAuth()) {
            $responseArr = Response::prepareJSONError("User is already logged in");
            return Response::prepareResponse(StatusCode::_409->value, $responseArr);
        }

        // Get the form data
        $formData = $this->request->POST;
        $formData = [
            'email'     => $formData['email'] ?? '',
            'password'  => $formData['password'] ?? ''
        ];

        $validationResult = FormValidator::validateAllEmpty($formData);
        if (! empty($validationResult)) {
            $responseArr = Response::prepareJSONError("Login failed", null, $validationResult);
            return Response::prepareResponse(StatusCode::_422->value, $responseArr);
        }

        // Get a user
        $user = (new UserModel($this->config->db))
            ->getUserWhose(
                email: $formData['email'],
                password: $formData['password']
            )
        ;
        if ($user == null) {
            $responseArr = Response::prepareJSONError("Incorrect email address or password", null, null);
            return Response::prepareResponse(StatusCode::_401->value, $responseArr);
        }

        $responseArr = Response::prepareJSONSuccess("Login successful", [
            'user'  => [
                'uid'       => $user->uid,
                'username'  => $user->username,
                'email'     => $user->email,
            ],
            'token' => $this->jwtTokenManger->generateJWT($user->uid)
        ]);

        return Response::prepareResponse(StatusCode::_200->value, $responseArr);
    }

    public function logout(): Response
    {
        // Get the JWT Token
        $token = $this->request->getAuthToken();
        if ($token === null) {
            return Response::prepareResponse(StatusCode::_401->value, [
                'status'    => 'error',
                'error'     => 'User is not logged in',
                'message'   => 'User must be logged in'
            ]);
        }

        // Black list token
        Session::update('jwt_blacklist', [$token], true);

        return Response::prepareResponse(StatusCode::_200->value, [
            'status'    => 'success',
            'message'   => 'You have been logged out successfully'
        ]);
    } 
}
