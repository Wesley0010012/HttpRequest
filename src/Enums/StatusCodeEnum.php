<?php

namespace Wesley0010012\HttpRequest\Enums;

use Exception;

class StatusCodeEnum
{
    public $value;

    private static $instances = [];

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function from(int $value): self
    {
        if (empty(self::$instances)) {
            self::init();
        }

        if (!isset(self::$instances[$value])) {
            throw new Exception("Status not found for this code: " . $value);
        }

        return self::$instances[$value];
    }

    public static function define(int $value): self
    {
        if (!isset(self::$instances[$value])) {
            self::$instances[$value] = new self($value);
        }
        return self::$instances[$value];
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public static function CONTINUE()
    {
        return self::define(100);
    }
    public static function SWITCHING_PROTOCOLS()
    {
        return self::define(101);
    }
    public static function PROCESSING()
    {
        return self::define(102);
    }
    public static function EARLY_HINTS()
    {
        return self::define(103);
    }

    public static function OK()
    {
        return self::define(200);
    }
    public static function CREATED()
    {
        return self::define(201);
    }
    public static function ACCEPTED()
    {
        return self::define(202);
    }
    public static function NON_AUTHORITATIVE_INFORMATION()
    {
        return self::define(203);
    }
    public static function NO_CONTENT()
    {
        return self::define(204);
    }
    public static function RESET_CONTENT()
    {
        return self::define(205);
    }
    public static function PARTIAL_CONTENT()
    {
        return self::define(206);
    }
    public static function MULTI_STATUS()
    {
        return self::define(207);
    }
    public static function ALREADY_REPORTED()
    {
        return self::define(208);
    }
    public static function IM_USED()
    {
        return self::define(226);
    }

    public static function MULTIPLE_CHOICES()
    {
        return self::define(300);
    }
    public static function MOVED_PERMANENTLY()
    {
        return self::define(301);
    }
    public static function FOUND()
    {
        return self::define(302);
    }
    public static function SEE_OTHER()
    {
        return self::define(303);
    }
    public static function NOT_MODIFIED()
    {
        return self::define(304);
    }
    public static function USE_PROXY()
    {
        return self::define(305);
    }
    public static function TEMPORARY_REDIRECT()
    {
        return self::define(307);
    }
    public static function PERMANENT_REDIRECT()
    {
        return self::define(308);
    }

    public static function BAD_REQUEST()
    {
        return self::define(400);
    }
    public static function UNAUTHORIZED()
    {
        return self::define(401);
    }
    public static function PAYMENT_REQUIRED()
    {
        return self::define(402);
    }
    public static function FORBIDDEN()
    {
        return self::define(403);
    }
    public static function NOT_FOUND()
    {
        return self::define(404);
    }
    public static function METHOD_NOT_ALLOWED()
    {
        return self::define(405);
    }
    public static function NOT_ACCEPTABLE()
    {
        return self::define(406);
    }
    public static function PROXY_AUTHENTICATION_REQUIRED()
    {
        return self::define(407);
    }
    public static function REQUEST_TIMEOUT()
    {
        return self::define(408);
    }
    public static function CONFLICT()
    {
        return self::define(409);
    }
    public static function GONE()
    {
        return self::define(410);
    }
    public static function LENGTH_REQUIRED()
    {
        return self::define(411);
    }
    public static function PRECONDITION_FAILED()
    {
        return self::define(412);
    }
    public static function PAYLOAD_TOO_LARGE()
    {
        return self::define(413);
    }
    public static function URI_TOO_LONG()
    {
        return self::define(414);
    }
    public static function UNSUPPORTED_MEDIA_TYPE()
    {
        return self::define(415);
    }
    public static function RANGE_NOT_SATISFIABLE()
    {
        return self::define(416);
    }
    public static function EXPECTATION_FAILED()
    {
        return self::define(417);
    }
    public static function IM_A_TEAPOT()
    {
        return self::define(418);
    }
    public static function MISDIRECTED_REQUEST()
    {
        return self::define(421);
    }
    public static function UNPROCESSABLE_ENTITY()
    {
        return self::define(422);
    }
    public static function LOCKED()
    {
        return self::define(423);
    }
    public static function FAILED_DEPENDENCY()
    {
        return self::define(424);
    }
    public static function TOO_EARLY()
    {
        return self::define(425);
    }
    public static function UPGRADE_REQUIRED()
    {
        return self::define(426);
    }
    public static function PRECONDITION_REQUIRED()
    {
        return self::define(428);
    }
    public static function TOO_MANY_REQUESTS()
    {
        return self::define(429);
    }
    public static function REQUEST_HEADER_FIELDS_TOO_LARGE()
    {
        return self::define(431);
    }
    public static function UNAVAILABLE_FOR_LEGAL_REASONS()
    {
        return self::define(451);
    }

    public static function INTERNAL_SERVER_ERROR()
    {
        return self::define(500);
    }
    public static function NOT_IMPLEMENTED()
    {
        return self::define(501);
    }
    public static function BAD_GATEWAY()
    {
        return self::define(502);
    }
    public static function SERVICE_UNAVAILABLE()
    {
        return self::define(503);
    }
    public static function GATEWAY_TIMEOUT()
    {
        return self::define(504);
    }
    public static function HTTP_VERSION_NOT_SUPPORTED()
    {
        return self::define(505);
    }
    public static function VARIANT_ALSO_NEGOTIATES()
    {
        return self::define(506);
    }
    public static function INSUFFICIENT_STORAGE()
    {
        return self::define(507);
    }
    public static function LOOP_DETECTED()
    {
        return self::define(508);
    }
    public static function NOT_EXTENDED()
    {
        return self::define(510);
    }
    public static function NETWORK_AUTHENTICATION_REQUIRED()
    {
        return self::define(511);
    }

    private static function init(): void
    {

        self::CONTINUE();
        self::SWITCHING_PROTOCOLS();
        self::PROCESSING();
        self::EARLY_HINTS();

        self::OK();
        self::CREATED();
        self::ACCEPTED();
        self::NON_AUTHORITATIVE_INFORMATION();
        self::NO_CONTENT();
        self::RESET_CONTENT();
        self::PARTIAL_CONTENT();
        self::MULTI_STATUS();
        self::ALREADY_REPORTED();
        self::IM_USED();

        self::MULTIPLE_CHOICES();
        self::MOVED_PERMANENTLY();
        self::FOUND();
        self::SEE_OTHER();
        self::NOT_MODIFIED();
        self::USE_PROXY();
        self::TEMPORARY_REDIRECT();
        self::PERMANENT_REDIRECT();

        self::BAD_REQUEST();
        self::UNAUTHORIZED();
        self::PAYMENT_REQUIRED();
        self::FORBIDDEN();
        self::NOT_FOUND();
        self::METHOD_NOT_ALLOWED();
        self::NOT_ACCEPTABLE();
        self::PROXY_AUTHENTICATION_REQUIRED();
        self::REQUEST_TIMEOUT();
        self::CONFLICT();
        self::GONE();
        self::LENGTH_REQUIRED();
        self::PRECONDITION_FAILED();
        self::PAYLOAD_TOO_LARGE();
        self::URI_TOO_LONG();
        self::UNSUPPORTED_MEDIA_TYPE();
        self::RANGE_NOT_SATISFIABLE();
        self::EXPECTATION_FAILED();
        self::IM_A_TEAPOT();
        self::MISDIRECTED_REQUEST();
        self::UNPROCESSABLE_ENTITY();
        self::LOCKED();
        self::FAILED_DEPENDENCY();
        self::TOO_EARLY();
        self::UPGRADE_REQUIRED();
        self::PRECONDITION_REQUIRED();
        self::TOO_MANY_REQUESTS();
        self::REQUEST_HEADER_FIELDS_TOO_LARGE();
        self::UNAVAILABLE_FOR_LEGAL_REASONS();

        self::INTERNAL_SERVER_ERROR();
        self::NOT_IMPLEMENTED();
        self::BAD_GATEWAY();
        self::SERVICE_UNAVAILABLE();
        self::GATEWAY_TIMEOUT();
        self::HTTP_VERSION_NOT_SUPPORTED();
        self::VARIANT_ALSO_NEGOTIATES();
        self::INSUFFICIENT_STORAGE();
        self::LOOP_DETECTED();
        self::NOT_EXTENDED();
        self::NETWORK_AUTHENTICATION_REQUIRED();
    }

    public static function getInformationalStatuses()
    {
        return [
            self::CONTINUE(),
            self::SWITCHING_PROTOCOLS(),
            self::PROCESSING(),
            self::EARLY_HINTS()
        ];
    }

    public static function getSuccessfulStatuses()
    {
        return [
            self::OK(),
            self::CREATED(),
            self::ACCEPTED(),
            self::NON_AUTHORITATIVE_INFORMATION(),
            self::NO_CONTENT(),
            self::RESET_CONTENT(),
            self::PARTIAL_CONTENT(),
            self::MULTI_STATUS(),
            self::ALREADY_REPORTED(),
            self::IM_USED()
        ];
    }

    public static function getRedirectionStatuses()
    {
        return [
            self::MULTIPLE_CHOICES(),
            self::MOVED_PERMANENTLY(),
            self::FOUND(),
            self::SEE_OTHER(),
            self::NOT_MODIFIED(),
            self::USE_PROXY(),
            self::TEMPORARY_REDIRECT(),
            self::PERMANENT_REDIRECT()
        ];
    }

    public static function getClientErrorStatuses()
    {
        return [
            self::BAD_REQUEST(),
            self::UNAUTHORIZED(),
            self::PAYMENT_REQUIRED(),
            self::FORBIDDEN(),
            self::NOT_FOUND(),
            self::METHOD_NOT_ALLOWED(),
            self::NOT_ACCEPTABLE(),
            self::PROXY_AUTHENTICATION_REQUIRED(),
            self::REQUEST_TIMEOUT(),
            self::CONFLICT(),
            self::GONE(),
            self::LENGTH_REQUIRED(),
            self::PRECONDITION_FAILED(),
            self::PAYLOAD_TOO_LARGE(),
            self::URI_TOO_LONG(),
            self::UNSUPPORTED_MEDIA_TYPE(),
            self::RANGE_NOT_SATISFIABLE(),
            self::EXPECTATION_FAILED(),
            self::IM_A_TEAPOT(),
            self::MISDIRECTED_REQUEST(),
            self::UNPROCESSABLE_ENTITY(),
            self::LOCKED(),
            self::FAILED_DEPENDENCY(),
            self::TOO_EARLY(),
            self::UPGRADE_REQUIRED(),
            self::PRECONDITION_REQUIRED(),
            self::TOO_MANY_REQUESTS(),
            self::REQUEST_HEADER_FIELDS_TOO_LARGE(),
            self::UNAVAILABLE_FOR_LEGAL_REASONS()
        ];
    }

    public static function getServerErrorStatuses()
    {
        return [
            self::INTERNAL_SERVER_ERROR(),
            self::NOT_IMPLEMENTED(),
            self::BAD_GATEWAY(),
            self::SERVICE_UNAVAILABLE(),
            self::GATEWAY_TIMEOUT(),
            self::HTTP_VERSION_NOT_SUPPORTED(),
            self::VARIANT_ALSO_NEGOTIATES(),
            self::INSUFFICIENT_STORAGE(),
            self::LOOP_DETECTED(),
            self::NOT_EXTENDED(),
            self::NETWORK_AUTHENTICATION_REQUIRED()
        ];
    }

    public static function convert(int $statusCode): self
    {
        return self::from($statusCode);
    }

    public function isInformational(): bool
    {
        return $this->isIn(self::getInformationalStatuses());
    }

    public function isSuccess(): bool
    {
        return $this->isIn(self::getSuccessfulStatuses());
    }

    public function isRedirection(): bool
    {
        return $this->isIn(self::getRedirectionStatuses());
    }

    public function isClientError(): bool
    {
        return $this->isIn(self::getClientErrorStatuses());
    }

    public function isServerError(): bool
    {
        return $this->isIn(self::getServerErrorStatuses());
    }

    private function isIn(array $statuses): bool
    {
        return in_array($this, $statuses, true);
    }
}
