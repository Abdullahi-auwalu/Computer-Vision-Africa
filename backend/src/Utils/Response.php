<?php

declare(strict_types=1);

namespace FranklinEkemezie\ComputerVisionAfrica\Utils;

class Response
{


    public function __construct(
        private int     $statusCode,
        private string  $body,
        private ?Header $header=null,
    )
    {

        $this->header ??= new Header;

    }

    // Static functions

    public static function prepareJSONSuccess(string $message, ?array $data): array
    {
        return [
            'status'    => 'success',
            'message'   => $message,
            'data'      => $data
        ];
    }

    public static function prepareJSONError(string $message, ?int $errorId=null, ?array $errors=null): array
    {
        return [
            'status'    => 'error',
            'message'   => $message,
            'error_id'  => $errorId,
            'errors'    => $errors
        ];
    }

    public static function prepareResponse(int $statusCode, mixed $message, bool $json=true): Response
    {
        $header = new Header();
        return
            new Response($statusCode,
            json_encode($message),
            $json ? 
                $header->setContentType(Header::CONTENT_TYPE_JSON) : $header
            )
        ;
    }


    public function send(): string
    {
        http_response_code($this->statusCode);

        // Send headers
        $this->header->send();

        // Return the response
        return $this->body;
    }

    public function getResponseBody(): string
    {
        return $this->body;
    }

    public function getResponseStatusCode(): int
    {
        return $this->statusCode;
    }

    public function __toString()
    {
        return $this->send();
    }

}