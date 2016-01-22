<?php

namespace Controllers;

use Core\FrontController;
use Core\Http\Response;

class IndexController extends FrontController{

    public function index()
    {

        $response = new Response();
        $content = view('index.index', ['content' => "Главная страница" ]);
        $response->content($content);

        return $response;
    }

}