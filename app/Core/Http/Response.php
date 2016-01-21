<?php


namespace Core\Http;


class Response {


    private $headers = [
        'Content-type'  => 'text/html',
        'Code'          => 200
    ];

    private $content = '';

    public function __construct()
    {
        //...
    }

    public function header($header, $value)
    {
        $this->headers[$header] = $value;
        return $this;
    }

    public function headers()
    {
        return $this->headers;
    }

    public function content($content=null)
    {
        if(!is_null($content)) {
            $this->content = $content;
            return $this;
        }else{
            return $this->content;
        }
    }

}