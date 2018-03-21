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

// Route name: Controller: Protected: (true / false).
// ?Need to setup page model?


$routes = array(
    "home" =>
        array(
            "controller" => "home",
            "protected" => true,
            "level" => array(0)
        ),
    "product" =>
        array(
            "controller" => "product",
            "protected" => true,
            "level" => array(0)
        ),
    "overview" =>
        array(
            "controller" => "overview",
            "protected" => true,
            "level" => array(0)
        ),
    "profile" =>
        array(
            "controller" => "profile",
            "protected" => true,
            "level" => array(1, 2)
        ),
    "cart" =>
        array(
            "controller" => "cart",
            "protected" => true,
            "level" => array(1, 2)
        ),
    "login" =>
        array(
            "controller" => "login",
            "protected" => false,
            "level" => 0
        ),
    "logout" =>
        array("controller" => "logout",
            "protected" => false,
            "level" => 0
        ));

// What is this doing here?
$allowed_requests = array(
    null
);

define("ROUTES", $routes);
