<?php

namespace KevinJFZ\AliSms;

class Helper
{

    // 将xml转为数组
    public static function xmlToArray($xml)
    {
        libxml_disable_entity_loader(true);
        $data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        if (!is_array($data)) {
            return [];
        }

        return $data;
    }


    // 阿里云验证签名
    public static function sign($params, $accessSecret)
    {
        unset($params['Signature']);
        ksort($params);

        $queryString = 'GET&' . urlencode('/') . '&' . urlencode(http_build_query($params));

        $hash_mac = hash_hmac('sha1', $queryString, $accessSecret . '&', true);
        $signature = base64_encode($hash_mac);

        $params['Signature'] = $signature;

        return $params;
    }


}
