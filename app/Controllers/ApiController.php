<?php

namespace Controllers;

use Core\FrontController;
use Core\Http\Request;
use Core\Http\Response;
use Models;

class ApiController extends FrontController{

    public function index(Request $request)
    {

        $newsModel = new Models\NewsModel();

        $onPage = 10;
        $page = intval($request->get('page'));

        $news = $newsModel->select($page, $onPage);

        $response = new Response();
        $response->header('Content-type', 'application/json')
        ->content(json_encode([
            'method' => 'newslist',
            'result' => [
                'items' => $news,
                'total' => 12,
                'page'  => $page,
                'onpage'=> $onPage,
                'pages' => 2
            ]
        ]));

        return $response;
    }

}