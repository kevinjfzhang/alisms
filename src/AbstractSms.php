<?php

namespace KevinJFZ\AliSms;

use GuzzleHttp\Client;

use KevinJFZ\AliSms\Message\SendSmsRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractSms
{

    use CommonParams {
        initialize as traitInitialize;
        getTimestamp as traitGetTimestamp;
        setTimestamp as traitSetTimestamp;
    }

    protected $httpClient;

    protected $httpRequest;


    public function __construct(Client $httpClient = null, Request $request = null)
    {
        $this->httpClient = $httpClient ?? $this->getDefaultHttpClient();
        $this->httpRequest = $request ?? $this->getDefaultHttpRequest();
        $this->initialize();
    }


    public function initialize()
    {

        $this->params = new ParameterBag;

        // set default parameters
        foreach ($this->getDefaultParams() as $key => $value) {
            if (is_array($value)) {
                $this->params->set($key, reset($value));
            } else {
                $this->params->set($key, $value);
            }
        }

        $this->traitInitialize($this->params->all());

        return $this;
    }


    // 默认参数
    public function getDefaultParams()
    {
        $this->traitSetTimestamp();

        $params =  [
            'SignatureMethod' => 'HMAC-SHA1',
            'SignatureNonce' => uniqid(time()),
            'SignatureVersion' => '1.0',
            'Timestamp' => $this->traitGetTimestamp(),
            'Format' => 'XML',
            'Version' => '2017-05-25',
            'RegionId' => 'cn-hangzhou',
        ];

        return $params;
    }


    protected function getDefaultHttpClient()
    {
        return new Client();
    }

    protected function getDefaultHttpRequest()
    {
        return new Request();
    }


    public function send(array $params)
    {
        return $this->createRequest(SendSmsRequest::class, $params);
    }


    protected function createRequest($class, array $params)
    {
        $obj = new $class($this->httpClient, $this->httpRequest);
        $params = array_replace($this->getParams(), $params);
        $request = $obj->initialize($params);
        return $request;
    }


    public function singleSms($params = array())
    {
        $params['Action'] = $this->getAction();
        return $this->createRequest('KevinJFZ\AliSms\Message\SendSmsRequest', $params);
    }


}
