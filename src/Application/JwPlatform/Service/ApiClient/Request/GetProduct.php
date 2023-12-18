<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient\Request;

use App\Application\Common\Service\ApiClient\Request\AbstractBaseRequest;
use App\Application\Common\Service\ApiClient\Request\RequestInterface;
use App\Application\Common\Service\ApiClient\Response\ResponseInterface;
use App\Application\JwPlatform\Service\ApiClient\Response\JwPlatformApiClientResponse;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

class GetProduct implements RequestInterface
{
    public function __construct(
        private readonly GetSingleProductInput $payload
    ) {
    }

    public function getRequestParams(): array
    {
        return [
            'xxx' => 'custom_request_param'
        ];
    }

    public function getEndpoint(): string
    {
        return "/xxx/xxx/{$this->payload->id}/xxx";
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getPayload(): ?\JsonSerializable
    {
        return $this->payload;
    }

    public function getMethod(): string
    {
        return Http::METHOD_GET;
    }

    public function transformResponse(array $response, int $code): ResponseInterface
    {
        return new JwPlatformApiClientResponse($response, $code);
    }
}