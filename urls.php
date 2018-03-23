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
    "404" =>
        array(
            "controller" => "FourOhFour",
            "protected" => false,
            "level" => array(0)
        ),
    "product" =>
        array(
            "controller" => "product",
            "protected" => false,
            "level" => array(0)
        ),
    "overview" =>
        array(
            "controller" => "overview",
            "protected" => false,
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
            "protected" => false,
            "level" => array(1, 2)
        ),
    "login" =>
        array(
            "controller" => "login",
            "protected" => false,
            "level" => array(0)
        ),
    "admin" =>
        array(
            "controller" => "admin",
            "protected" => true,
            "level" => array(1)
        ),
    "users" =>
        array(
            "controller" => "admin_users",
            "protected" => true,
            "level" => array(1)
        ),
    "products" =>
        array(
            "controller" => "admin_products",
            "protected" => true,
            "level" => array(1)
        ),
    "categories" =>
        array(
            "controller" => "admin_categories",
            "protected" => true,
            "level" => array(1)
        ),
    "logout" =>
        array("controller" => "logout",
            "protected" => false,
            "level" => array(0)
        ));

// What is this doing here?
$allowed_requests = array(
    null
);

define("ROUTES", $routes);
