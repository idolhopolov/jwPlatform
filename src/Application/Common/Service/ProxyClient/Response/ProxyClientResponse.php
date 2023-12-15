<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ProxyClient\Response;

abstract class ProxyClientResponse
{
    protected readonly array|string $response;
    protected readonly int $code;
    
    public function __construct(...$result)
    {
        $this->response = $result[0][0] ?? [];
        $this->code = $result[0][1] ?? 500;
    }

    public function getResponse(): array|string
    {
        return $this->response;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function toArray(): array
    {
        return [
            'response' => $this->response,
            'code' => $this->code,
        ];
    }
}