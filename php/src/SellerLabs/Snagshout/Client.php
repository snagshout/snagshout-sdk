<?php

namespace SellerLabs\Snagshout;

use Closure;
use DateTime;
use GuzzleHttp\Client as HttpClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Uri;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Joli\Jane\Runtime\Encoder\RawEncoder;
use Psr\Http\Message\RequestInterface;
use SellerLabs\Snagshout\Utils\NormalizerFactory;
use SellerLabs\Snagshout\Resource\DefaultResource;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Client
 *
 * @package SellerLabs\Snagshout
 *
 * @author Eduardo Trujillo <ed@sellerlabs.com>
 */
class Client
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

        $this->client = new HttpClient([
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
     * Builds an instance of the V1 resource.
     *
     * This resource can be used to make calls to all v1 API methods.
     *
     * @return DefaultResource
     */
    public function v1()
    {
        return new DefaultResource(
            new GuzzleAdapter($this->client),
            new GuzzleMessageFactory(),
            new Serializer(
                NormalizerFactory::create(),
                [
                    new JsonEncoder(
                        new JsonEncode(),
                        new JsonDecode()
                    ),
                    new RawEncoder()
                ]
            )
        );
    }
}