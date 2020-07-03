<?php

namespace KevinJFZ\AliSms;

class SingleSms extends AbstractSms
{

    public function getName()
    {
        return 'Send Single Sms';
    }

    public function getAction()
    {
        return 'SendSms';
    }

}
