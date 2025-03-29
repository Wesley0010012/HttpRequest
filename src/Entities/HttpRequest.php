<?php

namespace Wesley0010012\HttpRequest\Entities;

use Wesley0010012\HttpRequest\Enums\RequestTypeEnum;

class HttpRequest
{
    public function __construct(
        private readonly RequestTypeEnum $method = RequestTypeEnum::GET,
        private readonly string $url,
        private readonly mixed $body,
        private readonly array $headers = [],
        private readonly int $timeout = 30
    ) {}

    public function getMethod(): RequestTypeEnum
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getBody(): mixed
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }
}
