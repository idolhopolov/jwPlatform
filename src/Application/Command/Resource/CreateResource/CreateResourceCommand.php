<?php

namespace App\Application\Command\Resource\CreateResource;

use App\Application\Command\Resource\ResourcePayload;

class CreateResourceCommand
{
    public function __construct(
        private readonly ResourcePayload $payload
    ) {
    }

    public function getPayload(): ResourcePayload
    {
        return $this->payload;
    }
}