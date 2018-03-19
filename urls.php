<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 21-2-18
 * Time: 17:54
 */


/***************************************************
 *                      ROUTES                     *
 **************************************************/

// Name of route ( BETA! ), and controller used to produce content.
// Single point of entry, no longer supports method calls directly.
// Route:Controller
// Keep in mind that the underscore at the start of a route is reserved for the framework, ex: _route, _index etc.
$routes = array(
    "home" => "home",
    "product" => "product",
    "overview" => "overview",
    "profile" => "profile",
    "cart1" => "cart",
    "login" => "login",
    "logout" => "logout",
);

$allowed_requests = array(
    null
);

define("ROUTES", $routes);
