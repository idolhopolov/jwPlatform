<?php

namespace App\Application\Service\JwPlatformApiClient;

use App\Application\Command\Resource\ResourcePayload;

interface JwPlatformApiClient
{
    public function createResource(ResourcePayload $payload): array;
}