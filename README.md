# HttpRequest

## Description

The `HttpRequest` provides a simple interface for making HTTP requests. This facade encapsulates the complexity of creating HTTP requests, allowing intuitive GET, POST, PUT, PATCH, and DELETE calls.

## Installation

If you are using Composer, add the dependency to your project:

```sh
composer require wesley0010012/http-request
```

## Usage

Every request is maked using `HttpRequestFacade`.


Before making any requests, you can set the HttpRequestFacade to the singleton mode, preventing creation of some dependencies before every request:

```php
use Wesley0010012\HttpRequest\Facades\HttpRequestFacade;

HttpRequestFacade::singleton();
```

### Making a GET Request

```php
$response = HttpRequestFacade::get('https://api.example.com/data');

echo $response->getStatusCode()->value;
echo $response->getBody();
```

### Making a POST Request

```php
$response = HttpRequestFacade::post(
    'https://api.example.com/users',
    json_encode(['name' => 'John', 'email' => 'john@email.com']),
    ['Content-Type' => 'application/json']
);

echo $response->getStatusCode()->value;
echo $response->getBody();
```

### Making a PUT Request

```php
$response = HttpRequestFacade::put(
    'https://api.example.com/users/1',
    json_encode(['name' => 'John Doe']),
    ['Content-Type' => 'application/json']
);

echo $response->getStatusCode()->value;
echo $response->getBody();
```

### Making a PATCH Request

```php
$response = HttpRequestFacade::patch(
    'https://api.example.com/users/1',
    json_encode(['email' => 'new@email.com']),
    ['Content-Type' => 'application/json']
);

echo $response->getStatusCode()->value;
echo $response->getBody();
```

### Making a DELETE Request

```php
$response = HttpRequestFacade::delete('https://api.example.com/users/1');

echo $response->getStatusCode()->value;
echo $response->getBody();
```

## Method Parameters

All request methods follow the same signature:

```php
HttpRequestFacade::{method}(string $url, mixed $body = null, array $headers = [], int $timeout = 30): HttpResponse
```

- `` (*string*): The request URL.
- `` (*mixed*): The request body, optional for `GET` and `DELETE`.
- `` (*array*): HTTP headers.
- `` (*int*): Request timeout in seconds (default: `30`).

## Response

Each request returns an `HttpResponse` object, which can be used to access:

- `getStatusCode()`: Returns the HTTP status code of the response.
- `getBody()`: Returns the response body or null if not exists.

## Statuses

Each HTTP status exposes the following methods to accurately classify the nature of the response:

- `isInformational()` (bool): Return if is a Informational status;
- `isSuccess()` (bool): Return if is a Success status;
- `isRedirection()` (bool): Return if is a Redirection status;
- `isClientError()` (bool): Return if is a Client Error status;
- `isServerError()` (bool): Return if is a Server Error status;

### Example Usage:

```php
echo $response->getStatusCode()->value; // 200
echo $response->getBody(); // "{\"message\": \"Success\"}"
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

