<?php


namespace Controllers;

use Core\FrontController;
use Core\Http\Request;
use Core\Http\Response;
use Models;

class NewsController extends FrontController{

    public function show(Request $request)
    {
        $response = new Response();
        $content = view('news.detail', ['page' => 'news', 'news' => []]);
        $response->content($content);

        return $response;
    }

    public function index(Request $request)
    {
        $response = new Response();
        $content = view('news.list', [ 'page' => 'news' ]);

        $response->content($content);

        return $response;
    }

}