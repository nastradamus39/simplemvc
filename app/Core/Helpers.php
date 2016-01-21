<?php

if(!function_exists("app_path")){
    function app_path()
    {
        return \Core\Config\Config::appPath();
    }
}

if(!function_exists("dd")){
    function dd($var)
    {
        echo "<pre>"; var_dump($var); echo "</pre>";
        die();
    }
}


if(!function_exists("view")){
    function view($template, $data = null)
    {
        $view = new \Core\BaseView($template, $data);
        return $view->render();
    }
}