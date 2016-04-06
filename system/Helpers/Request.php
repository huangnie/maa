<?php
/**
 * Request Class
 *
 * @version 1.1
 * @date created 2, 13, 2016
 */

namespace Helpers;

/**
 * It contains the request information and provide methods to fetch request body.
 */
class Request
{

    private static $_inputs = array();
    private static $_stream = array();
    private static $_files = array();
    private static $_validate = array();

    public static function init()
    {
        self::_parseStream();
        self::_parseInput();   
        self::_parseFiles(); 
       
    }

    /**
     * 数据验证
     *
     */
    public static function valid(array $valid)
    {   
        self::$_validate = $valid;
        self::_validCheck();
    }

    private static function _validCheck()
    {

    } 

    /**
     * Safer and better access to $_GET + $_POST + php://input
     *
     * @param string   $key
     * @param string   $type
     * @param $default
     *
     * @return mixed
     */
    public static function input($key, $type='string', $default='')
    {
        if(array_key_exists($key, self::$_inputs)) {
            return self::_formatValue(self::$_inputs[$key], $type) ;
        } else {
            return self::stream($key, $type, $default);
        }
    }

    /**
     * Safer and better access to $_FILE.
     *
     * @param string   $key
     *
     * @return mixed
     */
    public static function file($key)
    {
        return array_key_exists($key, self::$_files) ? self::$_files[ $key ] : array(); 
    }

    /**
     * Safer and better access to stram : php://input.
     *
     * @param string   $key
     *
     * @return mixed
     */
    public static function stream($key, $type='string', $default='')
    {
        return array_key_exists($key, self::$_stream)? self::_formatValue(self::$_stream[$key]) : $default;
    }

    private static function _formatValue($value, $type='string')
    {
        switch ($type) {
            case 'int':
                return intval($value);
                break;
            case 'string':
                return strval($value);
                break;
            case 'float':
                return floatval($value);
                break;
            case 'array':
                return intval($value);
                break;
            case 'json':

                break;
            default:
                return strval($value);
                break;
        }
    }

    private static function _parseStream()
    {
        if(!is_array(self::$_stream) || count(self::$_stream) == 0)  {
            parse_str(file_get_contents("php://input"), self::$_stream);
        } 
    }

    private static function _parseInput()
    {
        if(!is_array(self::$_inputs) || count(self::$_inputs) == 0) {
            self::$_inputs = array_merge($_GET, $_POST);
            unset($_GET);
            unset($_POST);   
        } 
    }

    static private function _parseFiles()
    {
        if(!is_array(self::$_files) || count(self::$_files) == 0) {
            self::$_files = !empty($_FILES) ? $_FILES : array();
            unset($_FILES);
        } 
    }

    /**
     * Detect if request is Ajax.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isAjax()
    {
        if (!empty($_SERVER['HTTP_X_inputED_WITH'])) {
            return strtolower($_SERVER['HTTP_X_inputED_WITH']) === 'xmlhttprequest';
        }
        return false;
    }
    
    /**
     * Detect if request is POST request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isPOST()
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    /**
     * Detect if request is GET request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isGET()
    {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }
    
    /**
     * Detect if request is PUT request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isPUT()
    {
        return $_SERVER["REQUEST_METHOD"] === "PUT";
    }
    
    /**
     * Detect if request is DEL request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isDEL()
    {
        return $_SERVER["REQUEST_METHOD"] === "DELETE" || $_SERVER["REQUEST_METHOD"] === "DEL";
    }

    /**
     * Detect if request is JSON request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isJSON()
    {
        return $_SERVER["REQUEST_METHOD"] === "JSON";
    }

     /**
     * Detect if request is JSON request.
     *
     * @static static method
     *
     * @return boolean
     */
    public static function isSTREAM()
    {
        return $_SERVER["REQUEST_METHOD"] === "STREAM";
    }
    
}
