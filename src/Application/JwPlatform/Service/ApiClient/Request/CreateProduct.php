<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient\Request;

use App\Application\Common\Service\ApiClient\Request\RequestInterface;
use App\Application\Common\Service\ApiClient\Response\ResponseInterface;
use App\Application\JwPlatform\Service\ApiClient\Response\JwPlatformApiClientResponse;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;

readonly class CreateProduct implements RequestInterface
{
    public function __construct(
        private CreateProductPayload $payload
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

    public function transformResponse(array $response, int $code): ResponseInterface
    {
        return new JwPlatformApiClientResponse($response, $code);
    }

    public function getRequestParams(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return [];
    }
}