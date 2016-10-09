<?php

namespace SellerLabs\Snagshout;

use Closure;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SyndicationClient
 *
 * @package SellerLabs\Snagshout
 *
 * @author Eduardo Trujillo <ed@sellerlabs.com>
 */
class SyndicationClient
{
    /**
     * @var string
     */
    protected $publicId;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var Uri
     */
    protected $endpoint;

    /**
     * SyndicationClient constructor.
     *
     * @param string $publicId
     * @param string $secretKey
     */
    public function __construct($publicId, $secretKey)
    {
        $this->publicId = $publicId;
        $this->secretKey = $secretKey;

        $this->endpoint = new Uri('https://www.snagshout.com');

        $stack = new HandlerStack();

        $stack->setHandler(new CurlHandler());

        $stack->push($this->makeAuthHandler());

        $this->client = new Client([
            'handler' => $stack,
        ]);
    }

    /**
     * @param string $publicId
     */
    public function setPublicId(string $publicId)
    {
        $this->publicId = $publicId;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @param Uri $endpoint
     */
    public function setEndpoint(Uri $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Computes the hash of a string using the secret key.
     *
     * @param string $content
     *
     * @return string
     */
    protected function hash($content)
    {
        $timestamp = (new DateTime())->format('Y-m-d H');

        return hash_hmac(
            'sha512',
            $content . $timestamp,
            $this->secretKey
        );
    }

    /**
     * A Guzzle middleware that automatically adds the required Authorization
     * and Content-Hash headers required by the Snagshout API.
     *
     * @return Closure
     */
    protected function makeAuthHandler()
    {
        return function (callable $handler) {
            return function (
                RequestInterface $request,
                array $options
            ) use ($handler) {
                $contentHash = $this->hash($request->getBody());

                $partialUri = $request->getUri();
                $uri = $this->endpoint
                    ->withPath(
                        $this->endpoint->getPath()
                        . $partialUri->getPath()
                    )
                    ->withQuery($partialUri->getQuery())
                    ->withFragment($partialUri->getFragment());

                $request = $request
                    ->withUri($uri)
                    ->withHeader(
                        'Authorization',
                        vsprintf('Hash %s', [$this->publicId])
                    )
                    ->withHeader('Content-Hash', $contentHash);

                return $handler($request, $options);
            };
        };
    }

    /**
     * Searches for campaigns/offers.
     *
     * @param array $options
     *
     * @return ResponseInterface
     */
    public function getCampaigns(array $options = [])
    {
        return $this->client->get('/api/v1/campaigns', array_merge_recursive(
            [
                'query' => [
                    'embeds' => 'promotions',
                ]
            ],
            $options
        ));
    }
}