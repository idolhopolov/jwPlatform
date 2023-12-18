<?php

namespace App\Application\JwPlatform\DTO\ApiClient;

use App\Application\Common\Service\ApiClient\CommonConfigurationApiClientInterface;

readonly class JwPlatformApiClientConfiguration implements CommonConfigurationApiClientInterface
{
    public function __construct(private string $jWPlatformApiHost, private string $jWPlatformApiToken)
    {
    }

    public function getAuthHeader(): array
    {
        return ['X-Authorization' => $this->jWPlatformApiToken];
    }

    public function getBaseApiUrl(): string
    {
        return $this->jWPlatformApiHost;
    }
}