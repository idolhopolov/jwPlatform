<?php

declare(strict_types=1);

namespace App\Application\Product\Command\CreateProduct;

use App\Application\Common\Command\CommandHandlerInterface;
use App\Application\JwPlatform\Service\ApiClient\JwPlatformApiClientInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class CreateResourceCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private JwPlatformApiClientInterface $apiClient
    ) {
    }

    public function __invoke(CreateResourceCommand $command): void
    {
        $payload = $command->getPayload();

        $this->apiClient->createProduct($payload);
    }
}