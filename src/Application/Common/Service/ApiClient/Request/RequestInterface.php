<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient\Request;

use App\Application\Common\Service\ApiClient\Response\ResponseInterface;

interface RequestInterface
{
    public function getRequestParams(): array;

    public function getHeaders(): array;

    public function getPayload(): ?\JsonSerializable;

    public function getMethod(): string;

    public function getEndpoint(): string;

    public function transformResponse(array $response, int $code): ResponseInterface;
    
}
