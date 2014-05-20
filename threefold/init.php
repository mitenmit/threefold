<?
/*
INIT
Loads the Threefold class and renders the requested page.

@package Threefold
@since 1.0.0
*/

//Create Threefold object
require_once 'classes/threefold.php';
$threefold = new Threefold;

//Retrieve current request
$page = $_REQUEST['p'];
$sub = $_REQUEST['s'];

//Default page is home.phtml
if(!isset($page) || empty($page)) {
	$page = "home";
}

//Set the title to the name of the page
if ( CAPITALS_PREF === "all" ) {
	$threefold->title = strtoupper(str_replace('_', ' ', $page));
}else if ( CAPITALS_PREF === "first" ) {
	$threefold->title = ucfirst(str_replace('_', ' ', $page));
}else {
	$threefold->title = ucwords(str_replace('_', ' ', $page));
}

//Render the page
try {
	$threefold->load($page,$sub);
} catch (Exception $e) {
	echo $e->getMessage(), "\n";
}