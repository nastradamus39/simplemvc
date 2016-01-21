<?php

namespace Core;

use Core\Config\Config;
use Core\Exceptions\ControllerException;
use Core\Http\Response;
use Core\Route\Route;
use Controllers;

class App {

    public function fire()
    {

        if(!is_null(Route::$controller) && !is_null(Route::$action)){
            $controllerFile = Config::controllersPath().Route::$controller.".php";

            if(is_file($controllerFile)){

                require_once $controllerFile;

                if(class_exists("Controllers\\".Route::$controller)){
                    $controller = "Controllers\\".Route::$controller;
                    $controller = new $controller;
                    $action = Route::$action;
                    if(method_exists($controller, $action)) {
                        $this->response($controller->$action(Route::$request));
                    }
                    else {
                        throw new ControllerException("Action ".Route::$action." not defined.");
                    }
                }else{
                    throw new ControllerException("Class ".Route::$controller." not defined.");
                }
            }else{
                throw new ControllerException("Controller ".Route::$controller." not exists.");
            }
        }

    }

    public function response(Response $response)
    {
        $headers = $response->headers();

        ob_clean();

        foreach($headers as $header => $value)
            header("{$header}: {$value}");

        echo $response->content();
        exit();
    }

}