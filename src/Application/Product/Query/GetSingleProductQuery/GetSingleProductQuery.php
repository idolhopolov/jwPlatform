<?php

declare(strict_types=1);

namespace App\Application\Product\Query\GetSingleProductQuery;

use App\Application\Common\Query\QueryInterface;
use App\Application\Product\Query\Input\DTO\GetSingleProductInput;

readonly class GetSingleProductQuery implements QueryInterface
{
    public function __construct(
        private GetSingleProductInput $payload
    ) {
    }

    public function getPayload(): GetSingleProductInput
    {
        return $this->payload;
    }
}