<?php
/**
 * Tpl - load template pages
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Core;

/**
 * Tpl class to load template and Tpls files.
 */
class Tpl
{
    /**
     * @var array Array of HTTP headers
     */
    private static $_headers = array();

    /**
     * @var array Array data of Template
     */
    private static $_data = array();

    /**
     * Asign value of data.
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
     * parse data.
     *
     * @param  array  $data  array of data
     */
    public static function getData()
    {
       return self::$_data;
    }

    /**
     * Include template with layout.
     *
     * @param  string $path  relative path of file
     * @param  array  $data  array of data
     * @param  array  $custom select of templates
     */
    public static function render($path, array $data = null, $custom = TEMPLATE)
    {
        self::sendHeaders();  
        $data = empty($data) ? self::$_data : array_merge(self::$_data, $data);  
        count($data) > 0 && extract($data);
        // 解析通用模板
        ob_start();
        require TEMPLATE_PATH .DIRECTORY_SEPARATOR . $custom . DIRECTORY_SEPARATOR.'header'.PHP_EX;
        require TEMPLATE_PATH .DIRECTORY_SEPARATOR.$custom.DIRECTORY_SEPARATOR.'layout'.PHP_EX;
        require TEMPLATE_PATH .DIRECTORY_SEPARATOR . $custom . DIRECTORY_SEPARATOR.'footer'.PHP_EX;
        $layout = ob_get_contents();
        ob_end_clean();
  
        // 解析目标(视图)模板
        ob_start();
        require VIEW_PATH . DIRECTORY_SEPARATOR . $path . PHP_EX;
        $tmplate = ob_get_contents();
        ob_end_clean();  
 
        // deal layout
        $tmplate = preg_split('/@\s{0,3}end\s{0,3}@/', $tmplate);
        foreach ($tmplate as $tpl) {
            if(preg_match('/@section=(.*)@/is', $tpl, $matche)){
                $section = $matche[1];
                $tpl = preg_replace('/@section=(.*)@/is', '', $tpl);
                $layout = str_replace("@section={$section}", $tpl, $layout);
            }
        }
        // 替换
        echo preg_replace('/@section=.*\b/i', '', $layout); 
    }

    /**
     * Include relative path tpl without layout.
     *
     * @param  string $path  relative path of file 
     * @param  array  $data  array of data
     */
    public static function display($path, array $data = null)
    {
        self::sendHeaders();  
        $data = empty($data) ? self::$_data : array_merge(self::$_data, $data);  
        count($data) > 0 && extract($data);
        $file = self::_findFile( VIEW_PATH . DIRECTORY_SEPARATOR . $path );
        !empty($file) && include $file;
        
    }

     /**
     * Include relative path tpl without layout.
     *
     * @param  string $path  relative path of file 
     * @param  array  $data  array of data
     */
    public static function client($path, array $data = null)
    {
        self::sendHeaders();  
        $data = empty($data) ? self::$_data : array_merge(self::$_data, $data);  
        count($data) > 0 && extract($data);
        $file = self::_findFile( CLIENT_PATH . DIRECTORY_SEPARATOR . $path );
        !empty($file) && include $file;
    }

    /**
     * Include absolute path file.
     *
     * @param  string $file absolute path of file
     * 
     */
    private static function _findFile($file)
    {
        // matche file
        if(!is_file($file)) {
            $realFile = $file . PHP_EX; 
            if(!is_file($realFile)) {
                $realFile = $file . HTML_EX;
            }
        } else {
            $realFile = $file;   
        }
        
        // include
        if(is_file($realFile)){
           return $realFile ; 
        } else {
            echo "{$file}.php OR  {$file}.html all not exists!";
            return '';
        }
    }

    /**
     * Add HTTP header to headers array.
     *..     */
    public static function addHeader($header)
    {
        self::$_headers[] = $header;
    }

    /**
     * Add an array with headers to the Tpl.
     *
     * @param array $headers
     */
    public static function addHeaders(array $headers = array())
    {
        self::$_headers = array_merge(self::$_headers, $headers);
    }
    
    /**
     * Send headers
     */
    public static function sendHeaders()
    {
        if (!headers_sent()) {
            foreach (self::$_headers as $header) {
                header($header, true);
            }
        }
    }

    public static function setRestful()
    {
        if (!headers_sent()) {
            header('Contetn-Type: json/javascript', true);
        }
    }
}
