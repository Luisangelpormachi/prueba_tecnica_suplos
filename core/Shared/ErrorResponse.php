<?php

namespace Core\Shared;

class ErrorResponse extends Response{
    public function __construct(
        $data = null, 
        $status = 400, 
        string $message = 'Bad Request', 
        $errors = 'Bad Request', 
        $meta = null, 
        $links = null, 
        $included = null, 
        $jsonapi = null, 
        $headers = 'Content-Type: application/json', 
        $httpCode = 'HTTP/1.1 400 Bad Request'
    ) {
        parent::__construct($data, $status, $message, $errors, $meta, $links, $included, $jsonapi, $headers, $httpCode);
    }
} 