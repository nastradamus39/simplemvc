<?php

namespace Core\Route;

class RouteAbstract {


    protected static $get = [];

    public static function get($url, $controllerAction)
    {
        self::$get[] = [$url => $controllerAction];
    }

}