<?php

namespace KevinJFZ\AliSms;

trait CommonParams
{
    use ParamsTrait {
        setParam as traitSetParam;
        getParam as traitGetParam;
    }

    /**
     * @param $accessKeyId
     */
    public function setAccessKeyId($accessKeyId)
    {
        $this->traitSetParam('AccessKeyId', $accessKeyId);
    }

    /**
     * @return mixed
     */
    public function getAccessKeyId()
    {
        return $this->traitGetParam('AccessKeyId');
    }

    /**
     * @param $accessSecret
     */
    public function setAccessSecret($accessSecret)
    {
        $this->traitSetParam('AccessSecret', $accessSecret);
    }

    /**
     * @return mixed
     */
    public function getAccessSecret()
    {
        return $this->traitGetParam('AccessSecret');
    }


    /**
     * @param string $signatureMethod
     */
    public function setSignatureMethod(string $signatureMethod)
    {
        $this->traitSetParam('SignatureMethod', $signatureMethod);
    }

    /**
     * @return string
     */
    public function getSignatureMethod(): string
    {
        return $this->traitGetParam('SignatureMethod');
    }

    /**
     * @param string $signatureNonce
     */
    public function setSignatureNonce(string $signatureNonce)
    {
        $this->traitSetParam('SignatureNonce', $signatureNonce);
    }

    /**
     * @return string
     */
    public function getSignatureNonce(): string
    {
        return $this->traitGetParam('SignatureNonce');
    }


    /**
     * @param string $signatureVersion
     */
    public function setSignatureVersion(string $signatureVersion)
    {
        $this->traitSetParam('signatureVersion', $signatureVersion);
    }

    /**
     * @return string
     */
    public function getSignatureVersion(): string
    {
        return $this->traitGetParam('signatureVersion');
    }


    /**
     * @param string $version
     */
    public function setVersion(string $version)
    {
        $this->traitSetParam('version', $version);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->traitGetParam('version');
    }


    public function setTimestamp()
    {
        $time = time();
        $timestamp = date('Y-m-d', $time) . 'T' . date('H:i:s', $time) . 'Z';
        $this->traitSetParam('Timestamp', $timestamp);
    }

    public function getTimestamp()
    {
        return $this->traitGetParam('Timestamp');
    }


    /**
     * @param $format
     */
    public function setFormat($format)
    {
        $this->traitSetParam('Format', $format);
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->traitGetParam('Format');
    }


    /**
     * @param $regionId
     */
    public function setRegionId($regionId)
    {
        $this->traitSetParam('RegionId', $regionId);
    }

    /**
     * @return mixed
     */
    public function getRegionId()
    {
        return $this->traitGetParam('RegionId');
    }


    public function setAction($action)
    {
        $this->traitSetParam('Action', $action);
    }

    public function getAction()
    {
        return $this->traitGetParam('Action');
    }

}
