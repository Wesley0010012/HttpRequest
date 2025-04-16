<?php

namespace Wesley0010012\HttpRequest\Facades;

use Wesley0010012\HttpRequest\Entities\HttpRequest;
use Wesley0010012\HttpRequest\Entities\HttpResponse;
use Wesley0010012\HttpRequest\Enums\RequestTypeEnum;
use Wesley0010012\HttpRequest\Impl\CurlRequestService;
use Wesley0010012\HttpRequest\Interfaces\RequestService;

class HttpRequestFacade
{
    private static ?RequestService $requestService = null;

    public static function singleton(): void
    {
        if (!self::$requestService) {
            self::$requestService = new CurlRequestService();
        }
    }

    public static function get(
        string $url,
        array $headers = [],
        int $timeout = 30
    ): HttpResponse {
        return self::executeRequest(self::makeHttpRequest(RequestTypeEnum::GET, $url, null, $headers, $timeout));
    }

    public static function post(
        string $url,
        mixed $body = null,
        array $headers = [],
        int $timeout = 30
    ): HttpResponse {
        return self::executeRequest(self::makeHttpRequest(RequestTypeEnum::POST, $url, $body, $headers, $timeout));
    }

    public static function put(
        string $url,
        mixed $body = null,
        array $headers = [],
        int $timeout = 30
    ): HttpResponse {
        return self::executeRequest(self::makeHttpRequest(RequestTypeEnum::PUT, $url, $body, $headers, $timeout));
    }

    public static function patch(
        string $url,
        mixed $body = null,
        array $headers = [],
        int $timeout = 30
    ): HttpResponse {
        return self::executeRequest(self::makeHttpRequest(RequestTypeEnum::PATCH, $url, $body, $headers, $timeout));
    }

    public static function delete(
        string $url,
        array $headers = [],
        int $timeout = 30
    ): HttpResponse {
        return self::executeRequest(self::makeHttpRequest(RequestTypeEnum::DELETE, $url, null, $headers, $timeout));
    }

    private static function makeHttpRequest(RequestTypeEnum $requestType, string $url, mixed $body, array $headers, int $timeout): HttpRequest
    {
        return new HttpRequest($requestType, $url, $body, $headers, $timeout);
    }

    private static function executeRequest(HttpRequest $request): HttpResponse
    {
        return (self::$requestService ?? self::makeRequestService())->execute($request);
    }

    private static function makeRequestService(): RequestService {
        return new CurlRequestService();
    }
}
