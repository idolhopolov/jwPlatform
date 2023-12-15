<?php

namespace App\Application\Service\JwPlatformApiClient\Request;

use App\Application\Command\Resource\ResourcePayload;

class CreateResource
{
    public function __construct(
        private ResourcePayload $payload
    ) {
    }

    public function getPayload(): ?JsonSerializable
    {
        return $this->payload;
    }

    public function getEndpoint(): string
    {
        return "/xxx/xxx";
    }

    public function getMethod(): string
    {
        return Http::METHOD_POST;
    }

    public function transformResponse(array $response): array
    {
        return $response['data'] ?? [];
    }
}