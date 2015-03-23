<?php
/*
PATHS
Finds absolute local and remote paths to load resources correctly.

@since 1.0.0
*/
namespace Threefold;

//Define the absolute local path
define( 'ABSPATH', dirname(__FILE__) . '/' );

//Define the absolute remote path
$siteURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$siteURL .= "s";}
 $siteURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $siteURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/".ROOT_FOLDER;
 } else {
  $siteURL .= $_SERVER["SERVER_NAME"]."/".ROOT_FOLDER;
 }
define( 'SITE_URL', $siteURL );