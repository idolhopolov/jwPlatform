<?php

declare(strict_types=1);

namespace App\Application\Product\Command\CreateProduct;

use App\Application\Common\Command\CommandInterface;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;

readonly class CreateProductCommand implements CommandInterface
{
    public function __construct(
        private CreateProductPayload $payload
    ) {
    }

    public function getPayload(): CreateProductPayload
    {
        return $this->payload;
    }
}