<?php

namespace Wesley0010012\HttpRequest\Enums;

enum RequestTypeEnum: string {
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';
}