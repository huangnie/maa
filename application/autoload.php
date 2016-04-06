<?php
/**
 * Bootstrap - init
 *
 * @author Nickelhuang nickelyellowgmail.com
 * @version 2.2
 * @date created 2 ,15, 2016 by huangnie
 * @date updated 2 ,19, 2016 by huangnie
 */

/** load composer autoloader */
// define('VERDOR_PATH', realpath(dirname(SYSTEM_PATH)).DIRECTORY_SEPARATOR. 'vendor');
// $autoload_file = VERDOR_PATH.DIRECTORY_SEPARATOR.'autoload.php';
// if (file_exists($autoload_file)) {
//     require $autoload_file;
// } else {
//     echo "<h1>Please install via composer.json</h1>";
//     echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
//     echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
//     exit;
// }

if (!is_readable(SYSTEM_PATH . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . 'Config.php')) {
    die('No Config.php found, configure and rename Config.example.php to Config.php in system/Core.');
}
 
class Autoload
{
    /**
     * @param bool $prepend Whether to prepend the autoloader or not
     *
     */
    private static $_prepend = false;
    private static $_autoload = array();
    private static $_cacheFile = '';
    private static $_load_path = array();
    private static $_objs = array();

    function __constuct($cacheFile = null)
    {
        !empty($cacheFile) && $this->init($cacheFile);
    }

    function addPath($path)
    {
        if(is_array($path) && count($path) > 0) {
            self::$_load_path = array_merge(self::$_load_path, $path);
        } else if(is_string($path)) {
            !empty($path) && self::$_load_path[] = $path;
        }
        self::$_load_path = array_unique(self::$_load_path);
        return $this;
    }

    function init($cacheFile)
    {  
        if(is_file($cacheFile)) {
            $data = file_get_contents($cacheFile);
            self::$_autoload = !empty( $data ) ? unserialize( $data ) : array();  //可以为空
        } else {
            $dir = dirname($cacheFile);
            if(!is_dir($dir)) mkdir($dir, 0755, true);
            $fp = fopen($cacheFile, 'w');
            flock($fp, LOCK_EX | LOCK_NB);
            fwrite($fp, '');
            fclose($fp, LOCK_UN);
        }
        self::$_cacheFile = $cacheFile;
    }
    

    public function start($cacheFile = null)
    { 
        !empty($cacheFile) && $this->init($cacheFile); 
        // 自动寻址加载类
        spl_autoload_register(array($this, 'loadClass'), true, self::$_prepend);
    }

    public function loadClass($class)
    { 
        if ($class && !class_exists($class)) { 
            if(array_key_exists($class, self::$_autoload) && is_file(self::$_autoload[$class])) {
                include self::$_autoload[$class];  
            } else { 
                $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';  
                $count = 0;
                foreach (self::$_load_path as $key => $dir) {
                    $tmpFile = $dir. DIRECTORY_SEPARATOR. $file; 
                    if (file_exists($tmpFile)) { 
                        self::$_load_path[$class] = $tmpFile;
                        file_put_contents(self::$_cacheFile, serialize(self::$_load_path), LOCK_EX); // 离开时更新下文件
                        include $tmpFile;
                        break;
                    }
                    $count ++;
                }
                if($count >= count(self::$_load_path)) {
                    throw new Exception("{$class} path not found, please check your realpath of class", 404); 
                }
            }
        }
    }
}





 