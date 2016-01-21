<?php

namespace Core\Config;

class Config
{

    private static $_instance = null;

    private static $appPath = null;

    private static $controllersPath = null;

    private static $viewsPath = null;

    private static $MYSQL_HOST = 'localhost';

    private static $MYSQL_USER = 'root';

    private static $MYSQL_PASSWORD = '';

    private static $MYSQL_DB = 'smvc';

    private static $MYSQL_CONNECTION_CHARSET = 'UTF8';

    /**
     * COnfig Singleton
     * @return Config|null
     */
    public static function init()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
            self::initDefaultParams();
        }
        return self::$_instance;
    }

    private static function initDefaultParams()
    {
        /**
         * App root
         */
        if(is_null(self::$appPath))
            self::$appPath = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;

        /**
         * Controllers path
         */
        if(is_null(self::$controllersPath))
            self::$controllersPath = self::$appPath."Controllers".DIRECTORY_SEPARATOR;

        /**
         * Views path
         */
        if(is_null(self::$viewsPath))
            self::$viewsPath = self::$appPath."Views".DIRECTORY_SEPARATOR;
    }

    public static function appPath()
    {
        return self::$appPath;
    }

    public static function controllersPath()
    {
        return self::$controllersPath;
    }

    public static function viewsPath()
    {
        return self::$viewsPath;
    }

    public static function pdoConnectionString()
    {
        return "mysql:host=".self::$MYSQL_HOST.";dbname=".self::$MYSQL_DB.";charset=".self::$MYSQL_CONNECTION_CHARSET;
    }

    public static function mysqlUser()
    {
        return self::$MYSQL_USER;
    }

    public static function mysqlPassword()
    {
        return self::$MYSQL_PASSWORD;
    }

}