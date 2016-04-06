<?php
/**
 * Router - routing urls to closurs and controllers
 *
 * @author Nickelhuang nickelyellowgmail.com
 * @version 2.2
 * @date created 2 ,15, 2016 by huangnie
 * @date updated 2 ,19, 2016 by huangnie
 */

namespace Core;

use Core\Error;
use Core\Tpl;
// use Helpers\Request;
 
/**
 * Router class will load requested controller / closure based on url.
 */
class Router
{
    /**
     * 遍历 If true - go on processing other routes when match is found
     *
     * @var boolean $_ergodic  
     */
    private static $_ergodic = false;

    /**
     * Array of regx routes
     *
     * @var array $_callbacks
     */
    private static $_regx_routes = array(
        'routes' => array(),
        'methods' => array(),
        'callbacks' => array(),
    );

    /**
     * Array of eq routes
     *
     * @var array $_callbacks
     */
    private static $_eq_routes = array(
        'routes' => array(),
        'methods' => array(),
        'callbacks' => array(),
    );

    /**
     * Array of request methods be allowed 
     *
     * @var array $_callbacks
     */
    private static $_allowed_methods = array('ANY', 'GET', 'POST', 'PUT', 'DEL', 'OPTION');

    /**
     * Set an error callback
     *
     * @var null $_errorCallback
     */
    private static $_errorCallback = null;

    /** Set route patterns */
    private static $_patterns = array(
        '/:any' => '(?:\/?)([^/]*?)',
        '/:num' => '(?:\/?)([0-9]*?)',
        '/:mix' => '(?:\/?)(.*?)',
        '/:hex' => '(?:\/?)([[:xdigit:]]*?)',
        '/:uuidV4' => '(?:\/?)(\w{8}-\w{4}-\w{4}-\w{4}-\w{12})'
    );

    private static $_path = '';

    private static $_request_method = '';

    private static $_found_route = false;


    /**
     * Defines callback if route is not found.
     *
     * @param string $callback
     */
    public static function error($callback)
    {
        self::$_errorCallback = $callback;
    }

    /**
     * Is loading further routes after match.
     *
     * @param  boolean $flag
     */
    public static function ergodicMatch($flag = true)
    {
        self::$_ergodic = $flag;
    }

    public static function init(array $routes)
    { 
        if( isset($routes['index']) && !is_array($_routes['index']) && !empty($routes['index']) ) {
            self::_addRoute('any', '/', $routes['index']);
        }  

        // 解析
        self::_addModulesRoute($routes);
    }

    /**
     * Defines module routes.
     *
     * @param string self::$_request_method
     * @param array @params
     */
    private static function _addModulesRoute(array $routes, $prefix = '')
    {
        if(!is_array($routes) || count($routes) == 0) return false;
        foreach ($routes as $key => $route) {
            $method = strtoupper($key);
            if(in_array($method, self::$_allowed_methods) && is_array($route)) {
                self::_addRouteArr($method, $route, $prefix);
            } else  if(!is_array($route)){
                $key = str_replace('//', '/', "/{$prefix}/{$key}");   //注意 一个 '/' 的差异
                self::_addRoute('GET', $key, $route);
            } else if(is_array($route) && count($route) > 0) { 
                $key = str_replace('//', '/', "{$prefix}/{$key}"); 
                self::_addModulesRoute($route, $key);
            }
        }
    }

    private static function _addRouteArr($method, $routeArr, $prefix='')
    { 
        if(!is_array($routeArr) || count($routeArr) == 0) return false;
        foreach ($routeArr as $path => $callback) {  
            if(is_array($callback) || empty($callback)) continue;
            $path = str_replace('//', '/', "/{$prefix}/{$path}"); 
            self::_addRoute($method, $path, $callback, $prefix);
        } 
    }

    /**
     * Defines a route with or without callback and method.
     *
     * @param string self::$_request_method
     * @param array @params
     */
    private static function _addRoute($method, $path, $callback)
    {
        $method = strtoupper($method);
        if(strpos($path, '/:') !== false) {
            array_push(self::$_regx_routes['methods'], $method);
            array_push(self::$_regx_routes['routes'], $path);
            array_push(self::$_regx_routes['callbacks'], $callback);
        } else {
            array_push(self::$_eq_routes['methods'], $method);
            array_push(self::$_eq_routes['routes'], $path);
            array_push(self::$_eq_routes['callbacks'], $callback);
        }
        return true;
    }

   
    public static function getRequestMethod()
    {
        return self::$_request_method;
    }


    public static function getPath()
    {
        return self::$_path;
    }

    /**
     * Runs the callback for the given request.
     */
    public static function dispatch(array $routes = null)
    {     
        !empty($routes) && self::init($routes);

        if(empty(self::$_eq_routes) && empty(self::$_regx_routes)) {
            throw new \Exception("Error : Not init Routes", 401); 
        } 
         
        self::$_request_method = $_SERVER['REQUEST_METHOD'];
        self::$_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
        
        if(preg_match('/index\.php(.*)/i', self::$_path, $matched)) {
            self::$_path = $matched[1];
        }

        if (($num = strpos(self::$_path, '?')) !== false) {
            self::$_path = substr(self::$_path, 0, $num);
        }  

        // 全等匹配(优先级最高)
        if(!self::_parseEqualRoute()) { 
            // 正则匹配: if route is defined without regex
            self::$_found_route = self::_parseRegxRoute();   
        }   

        // run the error callback if the route was not found
        if (!self::$_found_route) { 
            if (is_null(self::$_errorCallback)) {
                // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
                $data['title'] = '404';
                $data['error'] = "Oh! Page not found..";
                Tpl::display('error/404', $data); 
            } 

            if (!is_object(self::$_errorCallback)) {
                //call object controller and method
                self::_invokeObject(self::$_errorCallback, 'No routes match the route: ' . self::$_path );
            } else {
                call_user_func(self::$_errorCallback);
            }
        }
    }

    /**
     * Call object and instantiate.
     *
     * @param  object $callback
     * @param  array  $args  array of matched parameters
     * @param  string $msg
     */
    private static function _invokeObject($callback, $args = null, $msg = null)
    {  
        $segments = explode('@', $callback);
        $controller = isset($segments[0]) && !empty($segments[0]) ? $segments[0] : DEFAULT_CONTROLLER;  
        $action = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : DEFAULT_ACTION;
        $obj = new $controller($msg); 

        if (method_exists($obj, $action)) { 
            $args = !is_array($args) ? array($args) : $args;
            // before
            if(method_exists($obj, 'before')) {
                call_user_func_array(array($obj, 'before'), array_filter($args)); 
            }
            // goal
            call_user_func_array(array($obj, $action), array_filter($args)); 
            // after
            if(method_exists($controller, 'after')) {
                call_user_func_array(array($obj, 'after'), array_filter($args));    
            }
            return true;
        } else {
            echo 'Action not found : ' . $controller . '->' . $action;
            return false;
        }
    }

     /**
     * 解析非正则路由, 全等于匹配.
     *
     */
    private static function _parseEqualRoute()
    {
        if(!isset(self::$_eq_routes['routes']) 
            || count(self::$_eq_routes['routes']) == 0) {
            return false;
        }

        $_routes = self::$_eq_routes['routes'];
        $_methods = self::$_eq_routes['methods'];
        $_callbacks = self::$_eq_routes['callbacks'];

        $route_pos = array_keys($_routes, self::$_path); 
        // foreach route position
        foreach ($route_pos as $pos) {
            $method = strtoupper($_methods[$pos]);
            if ($method == strtoupper(self::$_request_method) || $method == 'ANY') {
                //if route is not an object
                if (!is_object($_callbacks[$pos])) { 
                    //call object controller and method
                    self::_invokeObject($_callbacks[$pos]);
                } else {
                    //call closure
                    call_user_func($_callbacks[$pos]);
                }
                self::$_found_route = true;
                if(!self::$_ergodic) return true;
            }
        }
        // end foreach
        return false; 
    }

    /**
     * 解析正则路由.
     *
     */
    private static function _parseRegxRoute()
    {
        if(!isset(self::$_regx_routes['routes']) || count(self::$_regx_routes['routes']) == 0) {
            return false;
        }

        $searches = array_keys(self::$_patterns);
        $replaces = array_values(self::$_patterns); 

        $_routes = self::$_regx_routes['routes'];
        $_methods = self::$_regx_routes['methods'];
        $_callbacks = self::$_regx_routes['callbacks']; 

        $positionInx = 0;  
        // foreach routes
        foreach ($_routes as $route) { 
            $route = str_replace($searches, $replaces, $route);  
            if (preg_match('#^' . $route . '$#', self::$_path, $matched)) {
                self::$_found_route = true;
                if ($_methods[$positionInx] == self::$_request_method || $_methods[$positionInx] == 'ANY') {
                    //remove $matched[0] as [1] is the first parameter.
                    $matched = array_filter($matched);  
                    array_shift($matched);
                    if (!is_object($_callbacks[$positionInx])) { 
                        //call object controller and method
                        self::_invokeObject($_callbacks[$positionInx], $matched);
                    } else {
                        //call closure
                        call_user_func_array($_callbacks[$positionInx], $matched);
                    }
                    self::$_found_route = true;
                    if(!self::$_ergodic) return true;
                }
            }
            $positionInx++;
        }
        // end foreach
        return false;
    }

}
