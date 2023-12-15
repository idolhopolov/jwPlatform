<?php

namespace App\Application\Product\Command\CreateProduct;

use App\Application\Common\Command\CommandInterface;
use App\Application\Product\Command\Input\DTO\CreateProductPayload;

class CreateResourceCommand implements CommandInterface
{
    public function __construct(
        private readonly CreateProductPayload $payload
    ) {
    }

    public function getPayload(): CreateProductPayload
    {
        return $this->payload;
    }
}