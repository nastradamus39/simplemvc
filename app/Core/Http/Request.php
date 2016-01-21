<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.01.16
 * Time: 15:41
 */

namespace Core\Http;


class Request {

    /**
     * Request method
     * @var null
     */
    private static $method = null;

    /**
     * Request params
     * @var null
     */
    private $params = null;

    public function __construct()
    {
        self::$method = $_SERVER['REQUEST_METHOD'];
    }

    public function set($param, $value)
    {
        if($param && $value) $this->params[$param] = $value;
    }

    public function get($param, $defaultValue = false)
    {
        if(isset($this->params[$param])) return $this->params[$param];
        else return $defaultValue;
    }

}