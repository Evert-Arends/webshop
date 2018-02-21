<?php

/**
 * Core of the EmmaPHP MVC Framework.
 */
final class Core
{

    static $loader;

    /**
     * Constructor for the core
     * it loads in all configuration and interfaces
     * and then continues to load all components.
     * When that's done the Loader component will be loaded in an instructed
     * to load the designated controller.
     * @param null $route
     */
    public function __construct($route = null)
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

        foreach ($sysFiles as $file)
            require_once($file);

        // Include the configuration
        require_once("config.php");

        /*
         * If controller is not set default to
         * the default controller.
         * If the controller is set we use it. 
         */
        if (!isset ($route->index))
            $route->index = DEFAULT_CONTROLLER;

        // Check for the controller's actual file.
        if (!file_exists("application/controllers/" . $route->index . ".php"))
            if (DEBUG_MODE)
                die ("Couldn't find controller: " . $route->index . " :(");

        // Get it.
        require_once("application/controllers/" . $route->index . ".php");

        // Link it, detach the GET request and add the Controller affix.
        $controllerActual = $route->index;
        $route->index = null;

        // Define the loader
        $this->load = Loader::getInstance();

        // Register the loader to the core
        self::$loader = Loader::getInstance();

        // Use the loader to load the controller
        try {
            $this->load->controller($controllerActual);
        } catch (ReflectionException $e) {
        }

    }

}
