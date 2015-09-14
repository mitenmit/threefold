<?php
/***************
 * THREEFOLD
 ***************/

require __DIR__ . "/vendor/autoload.php";
$configuration = require_once __DIR__ . "/config/config.php";

define( 'ABSPATH', dirname(__FILE__) . '/' );

//Define the absolute remote path
$siteURL = 'http';
if ($_SERVER["HTTPS"] == "on") {
	$siteURL .= "s";
}
$siteURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80") {
    $siteURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/".ROOT_FOLDER;
} else {
    $siteURL .= $_SERVER["SERVER_NAME"]."/".ROOT_FOLDER;
}
define('SITE_URL', $siteURL);

//Retrieve current request
$page = $_REQUEST['p'];
$sub = $_REQUEST['s'];
$ext = $_REQUEST['e'];

//Default page is home.phtml
if(!isset($page) || empty($page)) {
	$page = 'home';
}

//Render the page
try {
	Threefold::load($page, $sub, $ext);
} catch (TemplateException $e) {
print "TemplateException: {$e->getMessage()}\n";
} catch (\Exception $e) {
	print "Exception: {$e->getMessage}\n";
}
