<?php
/**
 * Routing for built-in server
 */
if (php_sapi_name() == 'cli-server') {
    $uri = parse_url($_SERVER['REQUEST_URI']);
    if (file_exists(dirname(__DIR__) . "/$uri[path]")) {
        return false;
    } else {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'index.php';
        return true;
    }
}
