<?php

/**
 * Created by PhpStorm.
 * User: berm
 * Date: 19-2-18
 * Time: 14:16
 */
class Router
{
    /**
     * Router constructor.
     */
    private $routes;

    public function __construct()
    {
        // Create an object from the string specified by apache.
        $route = (!isset($_GET['c']) ? '' : $_GET['c']);
        $parts = explode('/', $route);

        // Create object from array values
        $routeObject = new stdClass();

        $skip = false; // Skip next item in foreach, because that is the value for the previous get request.
        foreach ($parts as $key => &$part) {
            if ($skip) {
                $skip = false;
                continue;
            }

            $attribute = $part;
            $value = null;

            if (isset($parts[$key++])) {
                $value = $parts[$key++];
            }

            $routeObject->$attribute = $value;
            $skip = true;
        }

        $this->routes = $routeObject;
    }

    public function route()
    {
        return $this->routes;
    }
}