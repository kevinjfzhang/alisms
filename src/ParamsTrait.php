<?php

namespace KevinJFZ\AliSms;

use Symfony\Component\HttpFoundation\ParameterBag;

trait ParamsTrait
{
    /**
     * Internal storage of all of the parameters.
     *
     * @var ParameterBag
     */
    protected $params;

    /**
     * Set one parameter.
     *
     * @param string $key Parameter key
     * @param mixed $value Parameter value
     * @return $this
     */
    protected function setParam($key, $value)
    {
        $this->params->set($key, $value);

        return $this;
    }

    /**
     * Get one parameter.
     *
     * @param string $key Parameter key
     * @return mixed A single parameter value.
     */
    protected function getParam($key)
    {
        return $this->params->get($key);
    }

    /**
     * Get all parameters.
     *
     * @return array An associative array of parameters.
     */
    public function getParams()
    {
        return $this->params->all();
    }

    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     * @return $this.
     */
    public function initialize(array $params = [])
    {
        $this->params = new ParameterBag;
        if (count($params)) {
            foreach ($params as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
        return $this;
    }

    /**
     * @param mixed ...$args
     * @throws \Exception
     */
    public function validate(...$args)
    {
        foreach ($args as $key) {
            $value = $this->params->get($key);
            if (!isset($value)) {
                throw new \Exception("Missing param: $key");
            }
        }
    }

}
