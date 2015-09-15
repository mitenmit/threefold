<?php
/**
 *
 *             88                                                  ad88              88           88
 *      ,d     88                                                 d8"                88           88
 *      88     88                                                 88                 88           88
 *    MM88MMM  88,dPPYba,   8b,dPPYba,   ,adPPYba,   ,adPPYba,  MM88MMM  ,adPPYba,   88   ,adPPYb,88
 *      88     88P'    "8a  88P'   "Y8  a8P_____88  a8P_____88    88    a8"     "8a  88  a8"    `Y88
 *      88     88       88  88          8PP"""""""  8PP"""""""    88    8b       d8  88  8b       88
 *      88,    88       88  88          "8b,   ,aa  "8b,   ,aa    88    "8a,   ,a8"  88  "8a,   ,d88
 *      "Y888  88       88  88           `"Ybbd8"'   `"Ybbd8"'    88     `"YbbdP"'   88   `"8bbdP"Y8
 *
 * @package Threefold
 * @since 2.0.0
 */

$configuration = require_once __DIR__ . "/config/bootstrap.php";

use Threefold\Threefold;
use Threefold\Request;

Threefold::dispatch(
    Request::createFromURI(),
    $configuration
);
