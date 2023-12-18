<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient;

use App\Application\Common\Service\ApiClient\AbstractCommonApiClient;
use App\Application\JwPlatform\Service\ApiClient\Request\CreateProduct;
use App\Application\JwPlatform\Service\ApiClient\Request\GetProduct;
use App\Application\JwPlatform\Service\ApiClient\Response\JwPlatformApiClientResponse;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

class JwPlatformApiClient extends AbstractCommonApiClient implements JwPlatformApiClientInterface
{
    public function __construct(JwPlatformApiClientConfiguration $configuration)
    {
        parent::__construct($configuration);
    }

    public function fetchProduct(GetSingleProductInput $payload): JwPlatformApiClientResponse
    {
        return $this->call(new GetProduct($payload));
    }

    public function createProduct(CreateProductPayload $payload): JwPlatformApiClientResponse
    {
        return $this->call(new CreateProduct($payload));
    }
}