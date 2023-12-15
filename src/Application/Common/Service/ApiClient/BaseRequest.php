<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient;

abstract class BaseRequest implements Request
{
    public function getRequestParams(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getPayload(): ?\JsonSerializable
    {
        return null;
    }

    public function getMethod(): string
    {
        return Http::METHOD_GET;
    }

    public function getEndpoint(): string
    {
        return '';
    }

    public function transformResponse(array $response): array
    {
        return $response;
    }
}