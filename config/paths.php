<?php
/**
 * Path definitions
 * @since 2.0.0
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('ROOT', dirname(__DIR__));
define('CONFIG', ROOT . DS . 'config' . DS);
define('PUBLIC_FOLDER', ROOT . DS . 'public' . DS);
define('THEME', PUBLIC_FOLDER . 'theme');
define('PAGES', PUBLIC_FOLDER . 'pages');
