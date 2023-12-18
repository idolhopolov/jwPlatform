<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient\Response;

use App\Application\Common\Service\ApiClient\Response\ResponseInterface;

readonly class JwPlatformApiClientResponse implements ResponseInterface
{
    public function __construct(private array $response, private int $code)
    {
    }

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}