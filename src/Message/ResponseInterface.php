<?php

namespace KevinJFZ\AliSms\Message;

/**
 * ResponseInterface
 *
 * This interface class defines the standard functions that any Message Response
 * Interface needs to be able to provide. It is an extension of MessageInterface.
 */
interface ResponseInterface extends MessageInterface
{

    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * Is the response successful?
     * @return bool
     */
    public function isSuccessful();

    /**
     * Response Message
     * @return mixed
     */
    public function getMessage();


    /**
     * Response code
     * @return mixed
     */
    public function getCode();


}
