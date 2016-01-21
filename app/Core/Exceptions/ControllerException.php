<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.01.16
 * Time: 17:30
 */

namespace Core\Exceptions;


class ControllerException extends \Exception{

    public function __construct()
    {
        header("HTTP/1.1 500 Internal error");
    }

}