<?php

declare(strict_types=1);

namespace App\Application\Common\Service\ApiClient;

use App\Application\Common\Service\ApiClient\Request\RequestInterface;
use App\Application\Common\Service\ApiClient\Response\ResponseInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use App\Application\Service\Share\ApiClient\Request;
use Symfony\Component\HttpClient\HttpClient;

abstract class AbstractCommonApiClient
{
    public function __construct(private readonly CommonConfigurationApiClientInterface $configuration)
    {

    }

    /**
     * @throws ExceptionInterface
     */
    protected function call(RequestInterface $request): ResponseInterface
    {
        $response = $this->createHttpClient()->request(
            $request->getMethod(),
            $this->resolveApiUrl($request->getEndpoint(), $request->getRequestParams()),
            [
                'headers' => $this->resolveHeaders($request),
                'json' => $request->getPayload(),
            ]
        );

        $content = $response->toArray(false);

        if ($response->getStatusCode() < 300) {
            return $request->transformResponse($content, $response->getStatusCode());
        }

        if (HttpFoundationResponse::HTTP_NOT_FOUND === $response->getStatusCode()) {
            throw new ApiClientNotFoundException($content);
        }

        if (HttpFoundationResponse::HTTP_CONFLICT === $response->getStatusCode()) {
            throw new ApiClientConflictException($content);
        }

        throw new ApiClientException($content, $response->getStatusCode());
    }

    private function resolveApiUrl(string $endpoint, array $params = []): string
    {
        $query = $this->makeQueryString($params);
        $url = $this->configuration->getBaseApiUrl() . $endpoint;

        if (!empty($query)) {
            $url .= '?' . $query;
        }

        return $url;
    }

    private function makeQueryString(array $params): string
    {
        $params = \array_map(static fn ($value) => null === $value || [] === $value ? '' : $value, $params);

        return \http_build_query($params, '', '&', \PHP_QUERY_RFC3986);
    }

    private function resolveHeaders(RequestInterface $request): array {
        return \array_merge($request->getHeaders(), $this->configuration->getAuthHeader());
    }

    private function createHttpClient(): HttpClientInterface
    {
        return HttpClient::create([

        ]);
    }
}