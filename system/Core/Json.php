<?php
/**
 * Json - outpit json data
 *
 * @author Nickelhuang  - nickelyellow@gmail.com
 * @version 2.2
 * @date cretaed 2,12,2016
 * @date updated 2,13, 2016
 */

namespace Core;

/**
 * Json class to load template and Jsons files.
 */
class Json
{
   
    const SUCCESS = 0;
    const FAILURE = -1;

    /**
     * @var array Array data of Template
     */
    private static $_data = array();

    function __construct()
    {

    }

    /**
     * Asign value.
     *
     * @param  string $field                field of data
     * @param  string|array|mix  $value     value of data
     */ 
    public static function asign($field, $value)
    {
        self::$_data[$field] = $value;
    }

    /**
     * Set data.
     *
     * @param  array  $data  array of data
     */
    public static function setData(array $data)
    {
        self::$_data = $data;
    }

    /**
     * Include template with layout.
     *
     * @param  array  $data  array of data
     */
    public static function success($result = null, $msg = '请求成功')
    {
        if(is_array($result) && count($result) > 0) {
            self::$_data =  array_merge(self::$_data, $result);
        } else if(!is_null($result)) {
            self::$_data = $result;
        } 
        self::_output(self::SUCCESS, $msg, self::$_data);    
    }

    /**
     * Include template with layout.
     *
     * @param  array  $data  array of data
     */
    public static function failure($msg = '请求失败')
    {
        self::_output(self::FAILURE, $msg);
    }

    /**
     * Include template file without layout.
     *
     * @param  string $path  path to file from Jsons folder
     * @param  array  $data  array of data
     */
    public static function error($code, $msg = false)
    {
        self::_output($code, $msg);  
    }

    private static function _output($code, $msg, $result = '')
    {
        $data = array(
            'code' => $code,
            'msg' => $msg,
            'result' => $result
        );
        echo json_encode($data);
    }

    public static function setRestful()
    {
        if (!headers_sent()) {
            header('Contetn-Type:application/x-javascript', true);
            header('Contetn-Type:application/json', true);
        }
    }

    public static function encode($data)
    {
        return json_encode($data);
    }

    public static function decode($data)
    {
        return json_encode($data);
    }
}
