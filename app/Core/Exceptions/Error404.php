<?

namespace Core\Exceptions;


class Error404 extends \Exception{

    public function __construct()
    {
        header("HTTP/1.1 404 Not found");
    }

}