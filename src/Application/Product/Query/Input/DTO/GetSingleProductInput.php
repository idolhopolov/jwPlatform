<?php

namespace App\Application\Product\Query\Input\DTO;

readonly class GetSingleProductInput implements \JsonSerializable
{
    #[Groups(['default'])]
    public int $id;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}