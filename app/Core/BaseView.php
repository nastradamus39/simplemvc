<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.01.16
 * Time: 19:13
 */

namespace Core;

use Core\Config\Config;

class BaseView {

    private $template;

    private $data;

    public function __construct($template, $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        $template = Config::viewsPath().str_replace(".", DIRECTORY_SEPARATOR, $this->template).".template.php";
        $data = $this->data;
        if(is_file($template)) require_once $template;
    }

}