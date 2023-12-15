<?php

namespace App\Application\Service\Share;

class ApiClient
{
    /**
     * @throws ApiClientNotFoundException|ConflictException
     */
    protected function call(Request $request): array
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

            if (204 === $response->getStatusCode()) {
                return [];
            }

            $content = $response->toArray(false);

            if ($response->getStatusCode() <= 300) {
                return $request->transformResponse($content);
            }

            if (404 === $response->getStatusCode()) {
                throw new ApiClientNotFoundException($content['message'] ?? 'Resource not found');
            }

            if (409 === $response->getStatusCode()) {
                throw new ConflictException($content['message'] ?? 'Resource conflict');
            }

            return $request->transformResponse($response->toArray());
        } catch (ApiClientNotFoundException|ConflictException $exception) {
            throw $exception;
        } catch (\Throwable $e) {
            throw new ApiClientException('Unable to communicate with API: ['.$e->getCode().'] '.$e->getMessage());
        }
    }
}