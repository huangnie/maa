<?php
/**
 * Config - an example for setting up system settings.
 * When you are done editing, rename this file to 'Config.php'.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Core;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {

        /**
         * Turn on output buffering.
         */
        ob_start();
    }

    /**
     * 初始化
     */
    function init()
    {
        /**
         * php文件名 后缀
         */
        define('PHP_EX', '.php');

         /**
         * html文件名 后缀
         */
        define('HTML_EX', '.html');

        /**
         * Define relative base path.
         */
        define('DIR', '/');

        /**
         * Set default controller and method for legacy calls.
         */
        !defined('DEFAULT_CONTROLLER') && define('DEFAULT_CONTROLLER', 'Index');
        !defined('DEFAULT_METHOD') && define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        !defined('TEMPLATE') && define('TEMPLATE', 'default');

        /**
         * Set a default language.
         */
        !defined('LANGUAGE_CODE') && define('LANGUAGE_CODE', 'zh');

        //database details ONLY NEEDED IF USING A DATABASE

        /**
         * Database engine default is mysql.
         */
        !defined('DB_TYPE') && define('DB_TYPE', 'mysql');

        /**
         * Database host default is localhost.
         */
        !defined('DB_HOST') && define('DB_HOST', '127.0.0.1');

        /**
         * Database name.
         */
        !defined('DB_NAME') && define('DB_NAME', 'todo_show');

        /**
         * Database username.
         */
        !defined('DB_USER') && define('DB_USER', 'root');

        /**
         * Database password.
         */
        !defined('DB_PASS') && define('DB_PASS', '123456');

        /**
         * PREFER to be used in database calls default is indoor_
         */
        !defined('PREFIX') && define('PREFIX', 'todo_show_');

        /**
         * Set prefix for sessions.
         */
        !defined('SESSION_PREFIX') && define('SESSION_PREFIX', 'todo_show_');

        /**
         * Optional create a constant for the name of the site.
         */
        define('SITE_VERSION', 'indoor V1.0');

        define('SITE_TITLE', 'indoor V1.0');
        
        /**
         * Optionall set a site email address.
         */
        //define('SITEEMAIL', '');

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /**
         * Set timezone.
         */
        date_default_timezone_set('PRC');

        /**
         * Start sessions.
         */
        Session::init();

    }

    public static function getConf($name = 'mysql')
    {
       
    }
}
