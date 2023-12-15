<?php

namespace App\Application\Command\Resource;

class ResourcePayload implements \JsonSerializable
{
    public int $foo;

    public int $boo;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}