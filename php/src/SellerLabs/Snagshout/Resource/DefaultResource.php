<?php

namespace SellerLabs\Snagshout\Resource;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
class DefaultResource extends Resource
{
    /**
     * 
     *
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SellerLabs\Snagshout\Model\V1GetStatusResponse
     */
    public function getApiV1Status($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/v1/status';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'www.snagshout.com', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SellerLabs\\Snagshout\\Model\\V1GetStatusResponse', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param array  $parameters {
     *     @var string $search 
     *     @var string $sort 
     *     @var int $page 
     *     @var int $limit 
     *     @var string $embeds 
     *     @var int $min 
     *     @var int $max 
     *     @var string $category 
     *     @var int $min_quantity 
     *     @var int $min_percentage 
     *     @var int $max_percentage 
     *     @var string $started_after 
     *     @var bool $upcoming 
     *     @var bool $is_fba 
     *     @var string $type 
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SellerLabs\Snagshout\Model\V1GetCampaignsResponse
     */
    public function getApiV1Campaign($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('search', NULL);
        $queryParam->setDefault('sort', NULL);
        $queryParam->setDefault('page', NULL);
        $queryParam->setDefault('limit', NULL);
        $queryParam->setDefault('embeds', NULL);
        $queryParam->setDefault('min', NULL);
        $queryParam->setDefault('max', NULL);
        $queryParam->setDefault('category', NULL);
        $queryParam->setDefault('min_quantity', NULL);
        $queryParam->setDefault('min_percentage', NULL);
        $queryParam->setDefault('max_percentage', NULL);
        $queryParam->setDefault('started_after', NULL);
        $queryParam->setDefault('upcoming', NULL);
        $queryParam->setDefault('is_fba', NULL);
        $queryParam->setDefault('type', NULL);
        $url = '/api/v1/campaigns';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'www.snagshout.com', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SellerLabs\\Snagshout\\Model\\V1GetCampaignsResponse', 'json');
            }
        }
        return $response;
    }
    /**
     * 
     *
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\SellerLabs\Snagshout\Model\V1GetCategoriesResponse
     */
    public function getApiV1Category($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/v1/categories';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'www.snagshout.com', 'Accept' => array('application/json')), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $promise = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'SellerLabs\\Snagshout\\Model\\V1GetCategoriesResponse', 'json');
            }
        }
        return $response;
    }
}