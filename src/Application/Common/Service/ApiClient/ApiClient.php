<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient;

abstract class ApiClient
{
    protected function call(Request $request, $responseIsString = false): array
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
            $content = $responseIsString
                ? $response->getContent(false)
                : $response->toArray(false);

            return $request->transformResponse([$content, $response->getStatusCode()]);
        } catch (\Throwable $e) {
            throw new ApiClientException('Unable to communicate with API: ['.$e->getCode().'] '.$e->getMessage());
        }
    }
}