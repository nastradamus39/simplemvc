<?

class SplClassLoader
{
    private $_fileExtension = '.php';
    private $_namespace;
    private $_namespaceSeparator = '\\';

    public function __construct($ns = null)
    {
        $this->_namespace = $ns;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    public function loadClass($className)
    {
        if (null === $this->_namespace ||
            $this->_namespace.$this->_namespaceSeparator === substr($className, 0, strlen($this->_namespace.$this->_namespaceSeparator))) {

            $fileName = '';

            if (false !== ($lastNsPos = strripos($className, $this->_namespaceSeparator))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace($this->_namespaceSeparator, DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
            }

            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).$this->_fileExtension;

            require_once $fileName;
        }
    }
}