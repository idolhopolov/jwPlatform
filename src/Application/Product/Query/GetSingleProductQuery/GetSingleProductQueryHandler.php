<?php

namespace App\Application\Product\Query\GetSingleProductQuery;

use App\Application\Common\Query\QueryInterface;
use App\Application\JwPlatform\Service\ApiClient\JwPlatformApiClient;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetSingleProductQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private JwPlatformApiClient $apiClient,
        private xxxTransformer $transformer
    )
    {
    }

    public function __invoke(GetSingleProductInput $query): ObjectResponse
    {
        $response = $this->apiClient->fetchProduct($query);

        return $this->transformer->makeFromProxy($response);
    }
}