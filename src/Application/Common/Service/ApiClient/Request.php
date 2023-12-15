<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient;

interface Request
{
    public function getRequestParams(): array;

    public function getHeaders(): array;

    public function getPayload(): ?\JsonSerializable;

    public function getMethod(): string;

    public function getEndpoint(): string;

    public function transformResponse(array $response): array;
    
}
