<?php

use Wesley0010012\HttpRequest\Entities\HttpResponse;
use Wesley0010012\HttpRequest\Facades\HttpRequestFacade;

require_once("../vendor/autoload.php");

function convertBoolToText(bool $value) {
    return $value ? 'Yes' : 'No';
}

HttpRequestFacade::singleton();

$response = (fn($i): HttpResponse => $i)(HttpRequestFacade::get("https://www.google.com"));
$statusCode = $response->getStatusCode();
$data = $response->getResponse();

echo "Status Code -> " . $statusCode->value . "\n";
echo "Response -> " . $data . "\n";
echo "Is Informational -> " . convertBoolToText($statusCode->isInformational()) . "\n";
echo "Is Successful -> " . convertBoolToText($statusCode->isSuccess()) . "\n";
echo "Is Redirection -> " . convertBoolToText($statusCode->isRedirection()) . "\n";
echo "Is Client Error -> " . convertBoolToText($statusCode->isClientError()) . "\n";
echo "Is Server Error -> " . convertBoolToText($statusCode->isServerError()) . "\n";
