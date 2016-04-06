<?php

define('ENVIRONMENT', 'development');

/**
 * Database engine default is mysql.
 */
!defined('DB_TYPE') && define('DB_TYPE', 'mysql');

/**
 * Database host default is localhost.
 */
!defined('DB_HOST') && define('DB_HOST', 'mysql');

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
 * PREFER to be used in database calls default is apishow_
 */
!defined('PREFIX') && define('PREFIX', 'todo_show_');

/**
 * Set prefix for sessions.
 */
!defined('SESSION_PREFIX') && define('SESSION_PREFIX', 'todo_show_');