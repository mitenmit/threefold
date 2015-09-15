<?php
/**
 * Request
 * ------------
 * Object that contains the current request and is parseable by Threefold
 *
 * @package Threefold
 * @since 2.0.0
 */
namespace Threefold;

class Request
{
    /**
     * All request parameters
     *
     * @var Array
     */
    protected $parameters;

    /**
     * Constructor
     * Create a new Request object
     *
     * @param string $parameterString
     * @return Request
     */
    public function __construct($uri)
    {
        $rawParams = explode("/", ltrim($uri, '/'));
        if (count($rawParams) > 1) {
            $this->parameters["pageName"] = array_pop($rawParams);
            $this->parameters["tree"] = implode('/', $rawParams) . '/';
        } elseif ($rawParams[0] !== "") {
            $this->parameters["pageName"] = $rawParams[0];
        } else {
            $this->parameters["pageName"] = "home";
        }
    }

    /**
     * Magic get function
     * Pulls parameter from array
     *
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        }
        return '';
    }

    /**
     *
     *
     * @param string $name
     * @return string
     */
    public static function createFromURI()
    {
        return new static($_SERVER['REQUEST_URI']);
    }
}
