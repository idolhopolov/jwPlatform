<?php

namespace App\Application\Common\Service\ApiClient;

interface CommonConfigurationApiClientInterface
{
    public function getAuthHeader(): array;

    public function getBaseApiUrl(): string;
}