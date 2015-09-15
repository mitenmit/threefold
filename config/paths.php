<?php
/**
 * Path definitions
 * @since 2.0.0
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('ROOT', dirname(__DIR__));
define('APP', ROOT . DS . APP_DIR . DS);
define('CONFIG', ROOT . DS . 'config' . DS);
define('WWW', ROOT . DS . 'public' . DS);
define('THEME', WWW . 'theme');
define('PAGES', WWW . 'pages');
