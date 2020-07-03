<?php

namespace KevinJFZ\AliSms\Message;

use GuzzleHttp\Client;
use KevinJFZ\AliSms\CommonParams;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractRequest implements RequestInterface
{

    use CommonParams;

    protected $httpClient;
    protected $httpRequest;
    protected $response;

    public function __construct(Client $client, HttpRequest $request)
    {
        $this->httpClient = $client;
        $this->httpRequest = $request;
    }

    protected function getDefaultHttpClient()
    {
        return new Client();
    }

    protected function getDefaultHttpRequest()
    {
        return new Request();
    }

    public function getDefaultParams()
    {
        return array();
    }


    public function getResponse()
    {
        if (null === $this->response) {
            throw new \Exception('You must call send() before accessing the Response!');
        }
    }

    public function send()
    {
        $data = $this->getData();
        return $this->sendData($data);
    }

}
