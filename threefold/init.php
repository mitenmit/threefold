<?php
/*
INIT
Loads the Threefold class and renders the requested page.

@package Threefold
@since 1.0.0
*/
namespace Threefold;
require_once 'lib/TemplateException.php';
require_once 'lib/Threefold.php';

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
	Threefold::load($page,$sub,$ext);
} catch (TemplateException $e) {
	print "TemplateException: {$e->getMessage()}\n";
} catch (\Exception $e) {
	print "Exception: {$e->getMessage}\n";
}