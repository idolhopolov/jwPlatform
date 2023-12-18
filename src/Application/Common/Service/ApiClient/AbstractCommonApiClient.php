<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient;

use App\Application\Common\Service\ApiClient\Request\RequestInterface;
use App\Application\Common\Service\ApiClient\Response\ResponseInterface;

abstract class AbstractCommonApiClient
{
    protected function call(RequestInterface $request): ResponseInterface
    {
        try {
            $response = $this->createHttpClient()->request(
                $request->getMethod(),
                $this->resolveApiUrl($request->getEndpoint(), $request->getRequestParams()),
                [
                    'headers' => $this->resolveHeaders($request),
                    'json' => $request->getPayload(),
                ]
            );

            return $request->transformResponse($response->toArray(false), $response->getStatusCode());
        } catch (\Throwable $e) {
            throw new ApiClientException('Unable to communicate with API: ['.$e->getCode().'] '.$e->getMessage());
        }
    }
}