<?php

namespace App\Application\JwPlatform\Service\ApiClient\Request;

use App\Application\Common\Service\ApiClient\BaseRequest;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;

class CreateProduct extends BaseRequest
{
    public function __construct(
        private readonly CreateProductPayload $payload
    ) {
    }

    public function getPayload(): \JsonSerializable
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