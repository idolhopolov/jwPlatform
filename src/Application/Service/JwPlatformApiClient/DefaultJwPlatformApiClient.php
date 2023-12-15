<?php

namespace App\Application\Service\JwPlatformApiClient;

use App\Application\Command\Resource\ResourcePayload;
use App\Application\Service\JwPlatformApiClient\Request\CreateResource;
use App\Application\Service\JwPlatformApiClient\Response\DefaultJwPlatformApiClientResponse;
use App\Application\Service\Share\ApiClient;

class DefaultJwPlatformApiClient extends ApiClient implements JwPlatformApiClient
{
    public function downloadExample(): DefaultJwPlatformApiClientResponse {
        return new DefaultJwPlatformApiClientResponse();
    }

    public function createResource(ResourcePayload $payload): array
    {
        return $this->call(new CreateResource($payload));
    }
}