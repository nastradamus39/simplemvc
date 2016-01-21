<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.01.16
 * Time: 18:43
 */

namespace Core;

use PDO;
use Core\Config\Config;

class BaseModel {

    protected $table = null;

    protected $dbn = null;

    public function __construct()
    {
        $this->_connect();
    }

    protected function _connect()
    {
        $this->dbn = new \PDO(Config::pdoConnectionString(), Config::mysqlUser(), Config::mysqlPassword());
    }

    public function fetchAll()
    {
        $res = $this->dbn->query("SELECT * from {$this->table};")->fetchAll();
        return $res;
    }

    public function select($onPage, $page)
    {

    }

}