<?php
/**
 * Bootstrapping process
 *
 * @package Threefold
 * @since 2.0.0
 */
// Set path definitions
require_once __DIR__ . "/paths.php";

// Use Composer's autoloader
require ROOT . DS . "vendor" . DS . "autoload.php";

// Load the configuration
$configuration = require_once __DIR__ . DS . "config.php";
return $configuration;
