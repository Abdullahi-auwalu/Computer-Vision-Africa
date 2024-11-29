<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Utils;

abstract class FormValidator
{

    private const FORM_FIELDS = [
        'firstname' => 'validateName',
        'lastname'  => 'validateName',
        'username'  => 'validateName',
        'email'     => 'validateEmail',
        'password'  => 'validatePassword',
        'password-confirm' => 'validatePasswordConfirm',
    ];

    private const VALID_PASSWORD_REGEX = [
        [
            'regex'     => '^.{8,}',
            'message'   => 'Password must be at least 8 characters long'
        ],
        [
            'regex'     => '^(?=.*[A-Za-z]).+$',
            'message'   => 'Password must contain at least one character'
        ],
        [
            'regex'     => '^(?=.*[A-Z]).+$',
            'message'   => 'Password must contain at least one uppercase letter'
        ],
        [
            'regex'     => '^(?=.*[a-z]).+$',
            'message'   => 'Password must contain at least one lowercase letter'
        ],
        [
            'regex'     => '^(?=.*\d).+$',
            'message'   => 'Password must contain at least one digit'
        ],
        [
            'regex'     => '^(?=.*[!@#$%^&*(),.?":{}|<>_]).+$',
            'message'   => 'Password must contain at least one special character'
        ]
    ];

    public static function sanitiseData(string $data): string
    {
        return htmlspecialchars(
            stripslashes(
                trim(
                    $data
                )
            )
        );
    }

    private static function getValidationErrorInfo(
        string $validationType,
        string $message
    ): array
    {
        return [
            'validationType'=> $validationType,
            'error'         => true,
            'message'       => $message
        ];
    }

    private static function getValidationSuccessInfo(string $validationType): array
    {
        return [
            'validationType'=> $validationType,
            'error'         => false,
            'message'       => ''
        ];
    }

    public static function validateName(string $name, string $type): array
    {
        $name = self::sanitiseData($name);
        if (! $name) {
            return self::getValidationErrorInfo($type, ucfirst($type) . ' cannot be empty');
        }

        if (! (strlen($name) <= 20)) {
            return self::getValidationErrorInfo($type, ucfirst($type) . ' is too long');
        }

        return self::getValidationSuccessInfo($type);
    }

    public static function validateEmail(string $email): array
    {
        if (! ($email = filter_var($email, FILTER_SANITIZE_EMAIL))) {
            return self::getValidationErrorInfo('email', 'Invalid email address');
        };

        return self::getValidationSuccessInfo('email');
    }


    public static function validatePassword(string $password): array
    {
        foreach(self::VALID_PASSWORD_REGEX as $regexConfig) {
            if (! preg_match("/{$regexConfig['regex']}/", $password)) {
                return self::getValidationErrorInfo('password', $regexConfig['message']);
            }
        }

        return self::getValidationSuccessInfo('password');
    }

    public static function validatePasswordConfirm(string $password, string $passwordConfirm): array
    {
        if ($password === "") {
            return self::getValidationErrorInfo('password', 'Password must not empty');
        }
        
        return $password === $passwordConfirm ?
            self::getValidationSuccessInfo('password-confirm') :
            self::getValidationErrorInfo('password', 'Passwords not match')
        ;
    }

    public static function validateAllEmpty(array $formData): array
    {
        $result = [];
        foreach ($formData as $field => $value) {
            if (empty($value)) {
                $result[$field] = ucfirst("$field cannot be empty");
            }
        }
        
        return $result;

    }

    public static function validateAll(array $formData, bool $verbose=false): array
    {
        $result = [];
        foreach ($formData as $field => $value) {
            $result[$field] = call_user_func_array(
                [self::class, self::FORM_FIELDS[$field]], 
                is_array($value) ? $value : [$value]
            );
        }

        return $verbose ? $result :
            array_map(
                fn($field)=> $field['message'],
                array_filter(
                    $result,
                    fn($field) => $field['error'],
                    ARRAY_FILTER_USE_BOTH
                )
            )
        ;
    }
}