<?php

namespace App\Application\Product\Command\Input\DTO;

use JMS\Serializer\Annotation\Groups;

readonly class CreateProductPayload implements \JsonSerializable
{
    #[Groups(['default'])]
    public int $foo;

    #[Groups(['default'])]
    public int $boo;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}