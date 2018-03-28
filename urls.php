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

/***
 * If protected is false, level can be removed from array, because there's no need to check if the user has the correct
 * level.
 *
 * Level 0 means that everyone who is logged in can access the page, people who are not logged in will be redirected to
 * the login page.
 *
 * If there's a faulty route / non-existing controller the app will crash, and not allow anyone to access any page to
 * prevent errors.
 */


$routes = array(
    "" =>
        array(
            "controller" => "home",
            "protected" => true,
            "level" => array(0)
        ),
    "home" =>
        array(
            "controller" => "home",
            "protected" => false,
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
    "register" =>
        array(
            "controller" => "register",
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
    "edit_product" =>
        array(
            "controller" => "admin_edit_product",
            "protected" => true,
            "level" => array(1)
        ),
    "delete_product" =>
        array(
            "controller" => "delete_product",
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
