<?php

namespace App\Application\Product\Query\GetSingleProductQuery;

use App\Application\Common\Query\QueryInterface;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

class GetSingleProductQuery implements QueryInterface
{
    public function __construct(
        private readonly GetSingleProductInput $payload
    ) {
    }

    public function getPayload(): GetSingleProductInput
    {
        return $this->payload;
    }
}