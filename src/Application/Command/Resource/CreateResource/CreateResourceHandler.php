<?php

namespace App\Application\Command\Resource\CreateResource;

use App\Application\Service\JwPlatformApiClient\JwPlatformApiClient;

class CreateResourceHandler
{
    public function __construct(
        private JwPlatformApiClient $apiClient
    ) {
    }

    public function __invoke(CreateResourceCommand $command): void
    {
        $payload = $command->getPayload();

        $this->apiClient->createResource($payload);
    }
}