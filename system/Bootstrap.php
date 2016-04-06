<?php
/**
 * Bootstrap - init
 *
 * @author Nickelhuang nickelyellowgmail.com
 * @version 2.2
 * @date created 2 ,15, 2016 by huangnie
 * @date updated 2 ,19, 2016 by huangnie
 */


use Core\Config;  
use Core\Router; 
use Helpers\Hooks;  
use Helpers\Request; 

/**
* 
*/
class Bootstrap
{
    private static $_routeFile = null;
    private static $_routes = null;

   
    function __construct($routeFile=null)
    {
        !empty($routeFile) && $this->setRouter($routeFile);
    }

    private function setRouter($routeFile=null)
    {
        self::$_routeFile = $routeFile;
        if(is_file(self::$_routeFile)){
            self::$_routes = include self::$_routeFile;
        } else {
            throw new Exception("Error : Not Found Router File", 404);
        }   
        return $this;
    }

    function start($routeFile=null)
    {  
        !empty($routeFile) && $this->setRouter($routeFile); 
             
        if(empty(self::$_routes)) {
            throw new Exception("Error : Not congfig routes", 401); 
        }

        /** initiate config */
        $conf = new Config();  
        $conf->init(); 

        /** init routes. */  
        Router::init(self::$_routes);     
       

        /** Module routes. */
        $hooks = Hooks::get(); 
        $hooks->run('routes');

        /** If no route found. */
        Router::error('Core\Error@index');   

        /** Init Request Param  */
        Request::init(); 

        /** Execute matched routes. */
        Router::dispatch(); 
    }

}
