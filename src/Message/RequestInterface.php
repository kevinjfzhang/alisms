<?php

namespace KevinJFZ\AliSms\Message;

/**
 * RequestInterface
 *
 * This interface class defines the standard functions that any Message Request
 * Interface needs to be able to provide. It is an extension of MessageInterface.
 */
interface RequestInterface extends MessageInterface
{
    /**
     * Initialize request with parameters
     * @param array $params The parameters to send
     */
    public function initialize(array $params = array());

    /**
     * Get all request params
     *
     * @return array
     */
    public function getParams();

    /**
     * Get the response to this request (if the request has been sent)
     *
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * Send the request
     *
     * @return ResponseInterface
     */
    public function send();

    /**
     * Send the request with specified data
     *
     * @param  mixed             $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data);


}
