<?php

namespace App\Application\Product\Command\CreateProduct;

use App\Application\Common\Command\CommandHandlerInterface;
use App\Application\JwPlatform\Service\ApiClient\JwPlatformApiClient;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateResourceCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private JwPlatformApiClient $apiClient
    ) {
    }

    public function __invoke(CreateResourceCommand $command): void
    {
        $payload = $command->getPayload();

        $this->apiClient->createProduct($payload);
    }
}