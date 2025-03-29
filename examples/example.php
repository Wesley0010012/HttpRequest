<?php

use Wesley0010012\HttpRequest\Entities\HttpResponse;
use Wesley0010012\HttpRequest\Facades\HttpRequestFacade;

require_once("../vendor/autoload.php");

HttpRequestFacade::singleton();

$response = (fn($i): HttpResponse => $i)(HttpRequestFacade::get("https://www.google.com"));
$statusCode = $response->getStatusCode()->value;
$data = $response->getResponse();

echo "Status Code -> " . $statusCode . "\n";
echo "Response -> " . $data . "\n";
