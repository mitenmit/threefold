<?php
/**
 * Routing for built-in server
 */
$_SERVER['PHP_SELF'] = '/' . basename(__FILE__);

$url = parse_url(urldecode($_SERVER['REQUEST_URI']));
$file = __DIR__ . $url['path'];
if (strpos($url['path'], '..') === false && strpos($url['path'], '.') !== false && is_file($file)) {
    return false;
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'index.php';
