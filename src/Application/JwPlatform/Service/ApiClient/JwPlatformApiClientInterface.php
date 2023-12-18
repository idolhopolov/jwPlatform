<?php

namespace App\Application\JwPlatform\Service\ApiClient;

use App\Application\JwPlatform\Service\ApiClient\Response\JwPlatformApiClientResponse;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

interface JwPlatformApiClientInterface
{
    public function fetchProduct(GetSingleProductInput $payload): JwPlatformApiClientResponse;

    public function createProduct(CreateProductPayload $payload): JwPlatformApiClientResponse;
}