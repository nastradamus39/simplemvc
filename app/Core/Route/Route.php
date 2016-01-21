<?

namespace Core\Route;

use Core\Exceptions;
use Core\Http\Request;

class Route extends RouteAbstract
{

    /**
     * Parsed controller
     * @var null
     */
    public static $controller = null;

    /**
     * Parsed action
     * @var null
     */
    public static $action = null;

    /**
     * Request
     * @var null
     */
    public static $request = null;


    static function start()
    {

        $routesFile = app_path()."routes.php";
        require_once $routesFile;

        $queryStr = trim($_SERVER['REQUEST_URI'], "/");
        $queryArr = explode('/', $queryStr);

        // check get patterns
        foreach (self::$get as $pattern) {
            $patternStr = array_keys($pattern)[0];
            $patternStr = trim($patternStr, "/");

            $patternArr = explode("/", $patternStr);

            // check if url match pattern
            $patternStr = preg_replace("/\{.*?\}/","[0-9a-zA-Z]+", $patternStr);
            $patternStr = str_replace("/","\\/", $patternStr);
            $patternStr = "/^".$patternStr."$/si";

            preg_match($patternStr, $queryStr, $matches);
            if(count($matches)){

                // parse controller and action
                $controllerAction = explode("@", array_values($pattern)[0]);
                self::$controller = $controllerAction[0];
                self::$action = $controllerAction[1];

                // parse params
                self::$request = new Request();

                foreach($patternArr as $i => $param){
                    if(preg_match("/^\{[0-9a-zA-Z]+\}$/si", $param)){
                        $param = preg_replace("/^\{([0-9a-zA-Z]+)\}$/si", "$1", $param);
                        self::$request->set($param, $queryArr[$i] );
                    }
                }

                return true;
            }

        }

        throw new Exceptions\Error404('Not found');

    }

}
