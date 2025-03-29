<?php

namespace Wesley0010012\HttpRequest\Interfaces;

use Wesley0010012\HttpRequest\Entities\HttpRequest;
use Wesley0010012\HttpRequest\Entities\HttpResponse;

interface RequestService
{
    public function execute(HttpRequest $request): HttpResponse;
}
