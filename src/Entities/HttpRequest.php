<?php

namespace Wesley0010012\HttpRequest\Entities;

use Wesley0010012\HttpRequest\Enums\RequestTypeEnum;

class HttpRequest
{
    public function __construct(
        private RequestTypeEnum $method,
        private string $url,
        private mixed $body,
        private array $headers = [],
        private int $timeout = 30
    ) {
        $this->method = $method ?? RequestTypeEnum::GET();
    }

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
