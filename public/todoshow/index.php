<?php 

header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */

/** Set the path of the project */
define('PROJECT_PATH', realpath(dirname(dirname(__DIR__)))); 


/** Set the path of the application */
define('APP_PATH', PROJECT_PATH . DIRECTORY_SEPARATOR . 'application');

/** Set the path of the confs */
define('CONFIG_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Configs');


$env = CONFIG_PATH. DIRECTORY_SEPARATOR .'env.php';
if(is_file($env)) {
    include CONFIG_PATH. DIRECTORY_SEPARATOR .'env.php';
} else {
    // die('No env.php found, configure env.php in application/configs.');
}


/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */
define('DEGUG', true);

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}

/**
 * Set a admin language.
 */
define('LANGUAGE_CODE', 'zh');

 
/** Set the path of the system  */
define('SYSTEM_PATH', PROJECT_PATH . DIRECTORY_SEPARATOR . 'system');

 
/** Set the path of the modules */
define('MODULE_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Modules');

/** Set the path of the plugins */
define('PLUGIN_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Plugins');

/** Set the path of the languags */
define('LANGUAGE_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Languages'); 

/** Set the path of the logs */
define('LOG_PATH', PROJECT_PATH . DIRECTORY_SEPARATOR . 'log'); 

/** Set the path of the caches */
define('CACHE_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Caches');


/** Set the path of the templates */
define('TEMPLATE_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Templates'); 

/** Set the path of the views */
define('VIEW_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'Views');


/** Set the path of the publics */
define('PUBLIC_PATH', PROJECT_PATH . DIRECTORY_SEPARATOR . 'public'); 

/** Set the path of the datas */
define('DATA_PATH', PUBLIC_PATH . DIRECTORY_SEPARATOR . 'data'); 


/** Set the path of the publics */
define('CLIENT_PATH', PUBLIC_PATH . DIRECTORY_SEPARATOR . 'todoshow' . DIRECTORY_SEPARATOR .'tpl'); 


/**
* Set default controller and action for legacy calls.
*/
define('DEFAULT_CONTROLLER', 'Index');
define('DEFAULT_ACTION', 'index');

/**
 * Set the guest template.
 */
define('TEMPLATE', 'guest');  

/**
 * 保存上传文件的方式: local 服务器硬盘, ftp 其他文件服务器
 */
define('UPLOAD_MODE', 'local');


include APP_PATH . DIRECTORY_SEPARATOR . 'autoload.php';
$autoload = new Autoload(); 
$autoload->addPath(array( APP_PATH, MODULE_PATH, LANGUAGE_PATH, SYSTEM_PATH ));
$autoload->addPath(array( SYSTEM_PATH ));
$autoload->start(CONFIG_PATH . DIRECTORY_SEPARATOR . 'autoloads' . DIRECTORY_SEPARATOR .'_autoload.guest.php'); 

$bootstrap = new Bootstrap();  
$bootstrap->start(CONFIG_PATH . DIRECTORY_SEPARATOR . 'routes'. DIRECTORY_SEPARATOR . 'guest.conf.php'); 