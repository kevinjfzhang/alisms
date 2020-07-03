<?php

namespace KevinJFZ\AliSms;

use GuzzleHttp\Client;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

class SmsFactory
{

    /**
     * @param $class
     * @param Client|null $httpClient
     * @param HttpRequest|null $httpRequest
     * @return mixed
     * @throws \Exception
     */
    public static function create($class, Client $httpClient = null, HttpRequest $httpRequest = null)
    {
        $class = 'KevinJFZ\\AliSms\\' . $class;

        if (!class_exists($class)) {
            throw new \Exception("Class '$class' not found");
        }
        return new $class($httpClient, $httpRequest);
    }


}
