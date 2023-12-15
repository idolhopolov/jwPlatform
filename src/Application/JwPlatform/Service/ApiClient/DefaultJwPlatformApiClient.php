<?php

namespace App\Application\JwPlatform\Service\ApiClient;

use App\Application\Common\Service\ApiClient\ApiClient;
use App\Application\JwPlatform\Service\ApiClient\Request\CreateProduct;
use App\Application\JwPlatform\Service\ApiClient\Request\GetProduct;
use App\Application\JwPlatform\Service\ApiClient\Response\DefaultJwPlatformApiClientResponse;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

class DefaultJwPlatformApiClient extends ApiClient implements JwPlatformApiClient
{
    public function fetchProduct(GetSingleProductInput $payload): DefaultJwPlatformApiClientResponse {
        return new DefaultJwPlatformApiClientResponse(
            $this->call(new GetProduct($payload), responseIsString: true)
        );
    }

    public function createProduct(CreateProductPayload $payload): DefaultJwPlatformApiClientResponse
    {
        return new DefaultJwPlatformApiClientResponse(
            $this->call(new CreateProduct($payload))
        );
    }
}