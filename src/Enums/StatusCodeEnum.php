<?php

namespace Wesley0010012\HttpRequest\Enums;

use Exception;

enum StatusCodeEnum: int
{
    case CONTINUE = 100;
    case SWITCHING_PROTOCOLS = 101;
    case PROCESSING = 102;
    case EARLY_HINTS = 103;

    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NON_AUTHORITATIVE_INFORMATION = 203;
    case NO_CONTENT = 204;
    case RESET_CONTENT = 205;
    case PARTIAL_CONTENT = 206;
    case MULTI_STATUS = 207;
    case ALREADY_REPORTED = 208;
    case IM_USED = 226;

    case MULTIPLE_CHOICES = 300;
    case MOVED_PERMANENTLY = 301;
    case FOUND = 302;
    case SEE_OTHER = 303;
    case NOT_MODIFIED = 304;
    case USE_PROXY = 305;
    case TEMPORARY_REDIRECT = 307;
    case PERMANENT_REDIRECT = 308;

    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case PAYMENT_REQUIRED = 402;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case NOT_ACCEPTABLE = 406;
    case PROXY_AUTHENTICATION_REQUIRED = 407;
    case REQUEST_TIMEOUT = 408;
    case CONFLICT = 409;
    case GONE = 410;
    case LENGTH_REQUIRED = 411;
    case PRECONDITION_FAILED = 412;
    case PAYLOAD_TOO_LARGE = 413;
    case URI_TOO_LONG = 414;
    case UNSUPPORTED_MEDIA_TYPE = 415;
    case RANGE_NOT_SATISFIABLE = 416;
    case EXPECTATION_FAILED = 417;
    case IM_A_TEAPOT = 418;
    case MISDIRECTED_REQUEST = 421;
    case UNPROCESSABLE_ENTITY = 422;
    case LOCKED = 423;
    case FAILED_DEPENDENCY = 424;
    case TOO_EARLY = 425;
    case UPGRADE_REQUIRED = 426;
    case PRECONDITION_REQUIRED = 428;
    case TOO_MANY_REQUESTS = 429;
    case REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    case UNAVAILABLE_FOR_LEGAL_REASONS = 451;

    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
    case BAD_GATEWAY = 502;
    case SERVICE_UNAVAILABLE = 503;
    case GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case VARIANT_ALSO_NEGOTIATES = 506;
    case INSUFFICIENT_STORAGE = 507;
    case LOOP_DETECTED = 508;
    case NOT_EXTENDED = 510;
    case NETWORK_AUTHENTICATION_REQUIRED = 511;

    /** StatusCodeEnum[] */
    public static function getInformationalStatuses(): array
    {
        return [
            self::CONTINUE,
            self::SWITCHING_PROTOCOLS,
            self::PROCESSING,
            self::EARLY_HINTS
        ];
    }

    /** StatusCodeEnum[] */
    public static function getSuccessfulStatuses(): array
    {
        return [
            self::OK,
            self::CREATED,
            self::ACCEPTED,
            self::NON_AUTHORITATIVE_INFORMATION,
            self::NO_CONTENT,
            self::RESET_CONTENT,
            self::PARTIAL_CONTENT,
            self::MULTI_STATUS,
            self::ALREADY_REPORTED,
            self::IM_USED
        ];
    }

    /** StatusCodeEnum[] */
    public static function getRedirectionStatuses(): array
    {
        return [
            self::MULTIPLE_CHOICES,
            self::MOVED_PERMANENTLY,
            self::FOUND,
            self::SEE_OTHER,
            self::NOT_MODIFIED,
            self::USE_PROXY,
            self::TEMPORARY_REDIRECT,
            self::PERMANENT_REDIRECT
        ];
    }

    /** StatusCodeEnum[] */
    public static function getClientErrorStatuses(): array
    {
        return [
            self::BAD_REQUEST,
            self::UNAUTHORIZED,
            self::PAYMENT_REQUIRED,
            self::FORBIDDEN,
            self::NOT_FOUND,
            self::METHOD_NOT_ALLOWED,
            self::NOT_ACCEPTABLE,
            self::PROXY_AUTHENTICATION_REQUIRED,
            self::REQUEST_TIMEOUT,
            self::CONFLICT,
            self::GONE,
            self::LENGTH_REQUIRED,
            self::PRECONDITION_FAILED,
            self::PAYLOAD_TOO_LARGE,
            self::URI_TOO_LONG,
            self::UNSUPPORTED_MEDIA_TYPE,
            self::RANGE_NOT_SATISFIABLE,
            self::EXPECTATION_FAILED,
            self::IM_A_TEAPOT,
            self::MISDIRECTED_REQUEST,
            self::UNPROCESSABLE_ENTITY,
            self::LOCKED,
            self::FAILED_DEPENDENCY,
            self::TOO_EARLY,
            self::UPGRADE_REQUIRED,
            self::PRECONDITION_REQUIRED,
            self::TOO_MANY_REQUESTS,
            self::REQUEST_HEADER_FIELDS_TOO_LARGE,
            self::UNAVAILABLE_FOR_LEGAL_REASONS
        ];
    }

    /** StatusCodeEnum[] */
    public static function getServerErrorStatuses(): array
    {
        return [
            self::INTERNAL_SERVER_ERROR,
            self::NOT_IMPLEMENTED,
            self::BAD_GATEWAY,
            self::SERVICE_UNAVAILABLE,
            self::GATEWAY_TIMEOUT,
            self::HTTP_VERSION_NOT_SUPPORTED,
            self::VARIANT_ALSO_NEGOTIATES,
            self::INSUFFICIENT_STORAGE,
            self::LOOP_DETECTED,
            self::NOT_EXTENDED,
            self::NETWORK_AUTHENTICATION_REQUIRED
        ];
    }

    public static function convert(int $statusCode): self
    {
        $status = self::tryFrom($statusCode);

        return $status ? $status : throw new Exception("Status not found for this code: " . $statusCode);
    }

    public function isInformational(): bool
    {
        return $this->handleIsIn(StatusCodeEnum::getInformationalStatuses());
    }

    public function isSuccess(): bool
    {
        return $this->handleIsIn(StatusCodeEnum::getSuccessfulStatuses());
    }

    public function isRedirection(): bool
    {
        return $this->handleIsIn(StatusCodeEnum::getRedirectionStatuses());
    }

    public function isClientError(): bool
    {
        return $this->handleIsIn(StatusCodeEnum::getClientErrorStatuses());
    }

    public function isServerError(): bool
    {
        return $this->handleIsIn(StatusCodeEnum::getServerErrorStatuses());
    }

    private function handleIsIn(array $statuses): bool
    {
        return in_array($this, $statuses, true);
    }
}
