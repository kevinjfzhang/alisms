# A php package to send sms by aliyun

## SendSms 一次请求发送相同的内容到不同的手机号

- [Aliyun Official Documents](https://help.aliyun.com/document_detail/101414.html?spm=a2c4g.11186623.6.624.3902152cB5dRWh)

- Sample
    
    ```php
    $accessKeyId = 'LTAI4FpByW*******';
    $accessSecret = 'O4R5upjjlTDsQmUm**********';

    $alisms = SmsFactory::create('SingleSms');

    $alisms->setAction('SendSmsa');
    $alisms->setAccessKeyId($accessKeyId);
    $alisms->setAccessSecret($accessSecret);

    // verify code  
    $code = str_pad(random_int(0, 9999), 4, 0, STR_PAD_LEFT);

    $params = [
        'PhoneNumbers' => '15814001234',
        'SignName' => '测试签名',
        'TemplateCode' => 'SMS_12345678',
        'TemplateParam' => json_encode(['code' =>$code], JSON_UNESCAPED_UNICODE)
    ];

    $request = $alisms->singleSms($params);
    $response = $request->send();

    if ($response->isSuccessful()){
        var_dump($response->getData());
    } else {
        var_dump($response->getData());
    }
    ```

