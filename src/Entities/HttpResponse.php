<?php

namespace Wesley0010012\HttpRequest\Entities;

use Wesley0010012\HttpRequest\Enums\StatusCodeEnum;

class HttpResponse
{
    public function __construct(
        private StatusCodeEnum $statusCode,
        private ?string $response
    ) {}

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->statusCode;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }
}
