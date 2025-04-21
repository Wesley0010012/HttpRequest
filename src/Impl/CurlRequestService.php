<?php

namespace Wesley0010012\HttpRequest\Impl;

use Wesley0010012\HttpRequest\Entities\HttpRequest;
use Wesley0010012\HttpRequest\Entities\HttpResponse;
use Wesley0010012\HttpRequest\Enums\RequestTypeEnum;
use Wesley0010012\HttpRequest\Enums\StatusCodeEnum;
use Wesley0010012\HttpRequest\Interfaces\RequestService;

class CurlRequestService implements RequestService
{
    public function execute(HttpRequest $request): HttpResponse
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $request->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $request->getTimeout());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod()->value);

        if (!empty($headers)) {
            $formattedHeaders = [];
            foreach ($headers as $key => $value) {
                $formattedHeaders[] = "$key: $value";
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $formattedHeaders);
        }

        if (in_array($request->getMethod(), [RequestTypeEnum::POST(), RequestTypeEnum::PUT(), RequestTypeEnum::PATCH()]) && !empty($request->getBody())) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($request->getBody()) ? json_encode($request->getBody()) : $request->getBody());
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);


        curl_close($ch);

        return new HttpResponse(
            StatusCodeEnum::convert($httpCode ?? 500),
            $response
        );
    }
}
