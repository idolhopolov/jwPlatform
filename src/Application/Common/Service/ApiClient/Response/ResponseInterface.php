<?php

namespace App\Application\Common\Service\ApiClient\Response;

interface ResponseInterface
{
    public function getResponse(): array;

    public function getCode(): int;
}