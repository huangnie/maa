<?php
/**
 * Error class - calls a 404 page.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Core;

use Core\Controller;
use Core\Tpl;

/**
 * Error class to generate 404 pages.
 */
class Error extends Controller
{

    /**
     * Save error to $this->error.
     *
     * @param string $error
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Load a 404 page with the error message.
     */
    public function index($error='not defined error')
    { 
        header("HTTP/1.0 404 Not Found");

        $data = array(
            'title' => '404',
            'error' => $error
        );
        
        echo self::display($data);
    }

    /**
     * Display errors.
     *
     * @param  array  $error an error of errors
     * @param  string $class name of class to apply to div
     *
     * @return string return the errors inside divs
     */
    public static function display($error, $class = 'alert alert-danger')
    {
        if (is_array($error)) {
            foreach ($error as $error) {
                $row.= "<div class='$class'>$error</div>";
            }
            return $row;
        } else {
            if (isset($error)) {
                return "<div class='$class'>$error</div>";
            }
        }
    }
}
