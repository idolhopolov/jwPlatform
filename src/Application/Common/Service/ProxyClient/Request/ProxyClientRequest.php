<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ProxyClient\Request;

use App\Application\Common\Service\ApiClient\BaseRequest;

abstract class ProxyClientRequest extends BaseRequest implements \JsonSerializable
{
    protected string $method;
    protected string $endpoint;
    protected array $content;
    protected array $headers;
    
    public function __construct(
        string $method,
        string $endpoint,
        array $content,
        array $headers
    ) {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->content = $content;
        $this->headers = $headers;
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