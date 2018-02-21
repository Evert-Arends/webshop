<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 21-2-18
 * Time: 17:54
 */


/***************************************************
 *                      URLS                       *
 **************************************************/

// Name of route ( BETA! ), and controller used to product content.
// Single point of entry, no longer supports method calls directly.
// Route:Controller
$urls = array(
    array("home" => "home"),
    array("product" => "product"),
    array("overview" => "overview"),
    array("profile" => "profile"),
    array("cart" => "cart"),
);

define("URLS", $urls);