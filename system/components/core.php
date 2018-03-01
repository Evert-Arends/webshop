<?php

/**
 * Core of the EmmaPHP MVC Framework.
 */
final class Core
{
    static $loader;
    public $routeObject;
    /**
     * Constructor for the core
     * it loads in all configuration and interfaces
     * and then continues to load all components.
     * When that's done the Loader component will be loaded in an instructed
     * to load the designated controller.
     */
    public function __construct()
    {
        // Start session if one isn't started
        if (!isset ($_SESSION))
            session_start();

        // Include all interfaces
        require_once("system/interfaces/isystemcomponent.php");
        require_once("system/interfaces/isystemcomponentdatacompatible.php");
        require_once("system/interfaces/icontroller.php");
        require_once("system/interfaces/imodel.php");
        require_once("system/interfaces/itable.php");

        // Include all components
        $sysFiles = glob("system/components/*.php");
        require_once("urls.php");

        foreach ($sysFiles as $file)
            require_once($file);

        // Include the configuration
        require_once("config.php");

        // Use the routing engine.
        $router = new Router();
        $this->routeObject = $router->getRoute();

        // Define the loader
        $this->load = Loader::getInstance();

        // Register the loader to the core
        self::$loader = Loader::getInstance();

        // Use the loader to load the controller
        try {
            $this->load->controller($router->getController(), $this->routeObject);
        } catch (ReflectionException $e) {
        }

    }

}
