<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Enums;

enum StatusCode: int {

    // OK
    case _200 = 200;

    // Created
    case _201 = 201;

    // No Content
    case _204 = 204;

    // Bad Request (Generic/Syntactic)
    case _400 = 400;

    // Unauthorised
    case _401 = 401;

    // Forbidden
    case _403 = 403;

    // Not Found
    case _404 = 404;

    // Conflict
    case _409 = 409;

    // Validation Error (Semantic)
    case _422 = 422;

    // Internal Server Error
    case _500 = 500;
}