<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient;

use App\Application\JwPlatform\Service\ApiClient\Response\DefaultJwPlatformApiClientResponse;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

interface JwPlatformApiClient
{
    public function fetchProduct(GetSingleProductInput $payload): DefaultJwPlatformApiClientResponse;

    public function createProduct(CreateProductPayload $payload): DefaultJwPlatformApiClientResponse;
}