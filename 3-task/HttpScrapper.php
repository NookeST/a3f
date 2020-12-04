<?php

namespace Task3;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class HttpScrapper implements Scrapper
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function getBody(string $url): string
    {
        try {
            $response = $this->makeRequest($url);
        } catch (GuzzleException $e) {
            throw new \RuntimeException("couldn't open url {$url}", $e->getCode(), $e);
        }
        // TODO: check more http request issues

        return $this->getUtf8Body($response);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function makeRequest(string $url): ResponseInterface
    {
        return $this->client->request('GET', $url);
    }

    private function getUtf8Body(ResponseInterface $response): string
    {
        $type = $response->getHeader('content-type');
        $parsed = \GuzzleHttp\Psr7\Header::parse($type);

        if (!array_key_exists('charset', $parsed[0])) {
            return (string)$response->getBody();
        }

        return mb_convert_encoding((string)$response->getBody(), 'UTF-8', $parsed[0]['charset']);
    }
}
