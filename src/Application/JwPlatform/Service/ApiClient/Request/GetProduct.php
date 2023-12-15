<?php

declare(strict_types=1);

namespace App\Application\JwPlatform\Service\ApiClient\Request;

use App\Application\Common\Service\ApiClient\BaseRequest;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

class GetProduct extends BaseRequest
{
    public function __construct(
        private readonly GetSingleProductInput $payload
    ) {
    }

    public function getRequestParams(): array
    {
        return [
        ];
    }

    public function getEndpoint(): string
    {
        return "/xxx/xxx/{$this->payload->id}/xxx";
    }
}