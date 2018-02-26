<?php

/**
 * Created by PhpStorm.
 * User: berm
 * Date: 19-2-18
 * Time: 14:16
 */
class Router
{
    static $loader;

    /**
     * Router constructor (Beta).
     * Retrieves route, creates a route object with all the get parameters
     * Checks for non existing routes and controllers
     * Uses first as get key, and second argument as value (repeats until there are no more arguments.)
     */
    private $routes;
    private $controller;

    public function __construct()
    {
        // Create an object from the string specified by apache.
        $route = (!isset($_GET['c']) ? '' : $_GET['c']);
        $parts = explode('/', $route);

        // Create object from array values
        $routeObject = new stdClass();

        // Skip next item in foreach, because that is the value for the previous get request.
        $skip = false;

        foreach ($parts as $key => &$part) {
            if ($key == 0) {
                if (isset($parts[$key])) {
                    $routeObject->_route = $parts[$key];
                    $skip = !$skip;

                    // Skip the rest of the loop
                    continue;
                }
            }


            if ($skip) {
                $skip = !$skip;
                // Skip this item
                continue;
            }

            $attribute = $part;
            $value = null;

            // Get next value from array
            $key++;
            // Check if value actually exists
            if (isset($parts[$key])) {
                // Assign value to variable
                $value = $parts[$key];
            }
            // Set attribute and its value
            $routeObject->$attribute = $value;
            $skip = !$skip;
        }
        // Check for broken routes.
        $this->checkRoutes();

        // Set route object
        $this->setRoutes($routeObject);

        if (!isset ($this->getRoute()->_route))
            $this->routes->_route = DEFAULT_CONTROLLER;

        $this->setController($this->getRoute()->_route);
        $this->requireController($this->getController());
    }

    private function checkRoutes()
    {
        $incorrectUrls = array();

        $urls = ROUTES;
        foreach ($urls as $url => $controller) {
            if (!$this->checkIfControllerExists($controller)) {
                array_push($incorrectUrls, "No such controller " . $controller);
                continue;
            }


        }
        // If there are incorrect routes, to prevent errors or an incorrectly working app.
        if (!empty($incorrectUrls)) {
            echo "Incorrect route bindings <br />";
            print_r($incorrectUrls);
            die(1);
        }
    }

    private function checkIfControllerExists($controller)
    {
        if (!file_exists("application/controllers/" . $controller . ".php")) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param $route
     */
    public function setController($route)
    {
        $routes = ROUTES;
        if (!isset($routes[$route])) {
            $this->controller = "home";
        } else {
            $this->controller = $routes[$route];
        }
    }

    private function requireController($controller)
    {
        require_once("application/controllers/" . $controller . ".php");
    }

    public function getRoute()
    {
        return $this->routes;
    }

    /**
     * @param mixed $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }
}