<?

error_reporting(E_ALL);

/**
 * Configure autoload
 */
require_once 'SplClassLoader.php';
$loader = new SplClassLoader();
$loader->register();

/**
 * Init config
 */
\Core\Config\Config::init();


/**
 * Include helpers
 */
require_once("Core/helpers.php");

ob_start();

try {

    /**
     * Route
     */
    \Core\Route\Route::start();

    /**
     * Fire!
     */
    $app = new \Core\App();
    $app->fire();

}catch( \Core\Exceptions\ControllerException $e){

    echo view('500.error');
    exit();

}catch( \Core\Exceptions\Error404 $e){

    echo view('404.error');
    exit();

}
