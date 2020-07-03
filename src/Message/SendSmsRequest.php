<?php

namespace KevinJFZ\AliSms\Message;

use KevinJFZ\AliSms\CommonParams;
use KevinJFZ\AliSms\Helper;

class SendSmsRequest extends AbstractRequest
{

    use CommonParams;

    protected $endpoint = 'http://dysmsapi.aliyuncs.com';

    // 发送单个短信接口
    public function Action()
    {
        return 'SendSms';
    }

    public function getData()
    {

        $this->validate(
            'AccessKeyId',
            'AccessSecret',
            'SignName',
            'PhoneNumbers',
            'TemplateCode',
            'TemplateParam'
        );

        $data = array(
            'SignatureMethod' => $this->getSignatureMethod(),
            'SignatureNonce' => $this->getSignatureNonce(),
            'AccessKeyId' => $this->getAccessKeyId(),
            'SignatureVersion' => $this->getSignatureVersion(),
            'Timestamp' => $this->getTimestamp(),
            'Format' => $this->getFormat(),
            'Action' => $this->getAction(),
            'Version' => $this->getVersion(),
            'RegionId' => $this->getRegionId(),
            'PhoneNumbers' => $this->getPhoneNumbers(),
            'SignName' => $this->getSignName(),
            'TemplateCode' => $this->getTemplateCode(),
            'TemplateParam' => $this->getTemplateParam()
        );

        $signedData = Helper::sign($data, $this->getAccessSecret());

        return $signedData;
    }

    /**
     *
     * @param string $code 4位数字的验证码
     */
    public function setTemplateParam($templateParam)
    {
        $this->setParam('TemplateParam', $templateParam);
    }

    public function getTemplateParam()
    {
        return $this->getParam('TemplateParam');
    }


    public function setTemplateCode($templateCode)
    {
        $this->setParam('TemplateCode', $templateCode);
    }

    public function getTemplateCode()
    {
        return $this->getParam('TemplateCode');
    }


    public function setSignName($signName)
    {
        $this->setParam('SignName', $signName);
    }

    public function getSignName()
    {
        return $this->getParam('SignName');
    }


    public function getPhoneNumbers()
    {
        return $this->getParam('PhoneNumbers');
    }

    public function setPhoneNumbers($phoneNumbers)
    {
        $this->setParam('PhoneNumbers', $phoneNumbers);
    }


    /**
     * Send request and get response
     */
    public function send()
    {
        $params = $this->getData();

        return $this->sendData($params);
    }


    public function sendData($params)
    {
        $url = $this->endpoint . '?' . http_build_query($params);
        $response = $this->httpClient->request('GET', $url)->getBody();
        $payload = Helper::xmlToArray($response);
        return $this->response = new SendSmsResponse($this, $payload);
    }


}
