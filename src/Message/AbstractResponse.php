<?php

namespace KevinJFZ\AliSms\Message;

abstract class AbstractResponse implements ResponseInterface
{
    protected $request;
    protected $data;

    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        $data  = $this->getData();
        return isset($data['Code']) && $data['Message'] == 'OK';
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->data['Message'];
    }

    public function getCode()
    {
        return $this->data['Code'];
    }

}
