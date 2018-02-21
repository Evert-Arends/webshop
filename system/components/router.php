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
        // Check for broken routes.
        $this->checkRoutes();

        // Set route object
        $this->setRoutes($routeObject);

        if (!isset ($this->getRoute()->index))
            $this->routes->index = DEFAULT_CONTROLLER;

        $this->setController($this->getRoute()->index);
        $this->requireController($this->getController());
    }

    private function checkRoutes()
    {
        $incorrectUrls = array();

        $urls = URLS;
        foreach ($urls as $url => $controllers) {
            foreach ($controllers as $key => $controller) {
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
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
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