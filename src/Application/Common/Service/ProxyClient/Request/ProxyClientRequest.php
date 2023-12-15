<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ProxyClient\Request;

use App\Application\Common\Service\ApiClient\BaseRequest;

abstract class ProxyClientRequest extends BaseRequest implements \JsonSerializable
{
    public function __construct(
        protected readonly string $method,
        protected readonly string $endpoint,
        protected readonly array $content,
        protected readonly array $headers
    ) {
    }
    
    public function getPayload(): ?\JsonSerializable
    {
        return $this;
    }
    
    public function getMethod(): string
    {
        return $this->method;
    }
    
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
    
    public function getHeaders(): array
    {
        return $this->headers;
    }
    
    public function jsonSerialize(): array
    {
        return $this->content;
    }
}