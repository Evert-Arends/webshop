<?php

/**
 * Loader of the EmmaPHP MVC Framework
 */
class Loader implements ISystemComponent
{

    static $instance;
    static $model;
    static $modelName;
    static $mod;
    static $modName;
    static $controller;
    static $database;

    /**
     * Prepares the loader to do whatever necessary.
     */
    function __construct()
    {

        // Load database
        self::$database = Database::getInstance();

        // Link an instance of the loader to itself
        self::$instance =& $this;

        //Load all mods
        ModLoader::getInstance();

    }

    /**
     * Loads a controller into the framework
     *
     * @param string $paramController
     * @param $request
     * @throws ReflectionException
     */
    public function controller($paramController, $request)
    {

        // Create given controller object
        $controller = new $paramController ();
        $controller->constructor($request);
        if (method_exists($controller, "init"))
            $controller->init($request);

        // Link the controller instance to the loader
        self::$controller =& $controller;

        /*
         * Check for a supplied method with the GET
         * If set we check if it's public and execute it if not
         * we throw an error
         */
        if (isset ($_GET["m"])) {

            if (!method_exists($controller, $_GET["m"]))
                die ("Couldn't find method: " . $_GET["m"]
                    . " <br/>In controller: " . $_GET["c"] . " :(");
            else {

                // Check if the supplied method is public
                $reflection = new ReflectionMethod ($controller, $_GET["m"]);
                if (!$reflection->isPublic()) {

                    if (DEBUG_MODE)
                        die("Method: " . $_GET["m"] . " from"
                            . " Controller: " . $_GET["c"]
                            . " is not a public method.");

                } //Check if arguments were supplied through GET
                else if (isset ($_GET["a"])) {

                    // Filter the arguments
                    $args = filter_var($_GET["a"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    // Run the desired method with applied arguments
                    $controller->{$_GET["m"]} ($args);

                } else {

                    // Run the desired method without any arguments
                    $controller->{$_GET["m"]} ();

                }

            }

        } else { // if $_GET["m"] isn't set

            // If the index method exists within the controller, we run it.
            if (method_exists($controller, "index"))
                $controller->index();

        }

    }

    /**
     * Loads a model into the framework
     *
     * @param string $paramModel
     * @param null $path
     */
    public static function model($paramModel, $path = null)
    {

        //Find, include and make the model ready
        $modelFileName = str_replace("Model", "", $paramModel);
        $modelName = ucfirst($paramModel);
        if (!$path) {
            require_once("models/" . strtolower($modelFileName) . ".php");
        } else {
            require_once(".".$path . $paramModel . ".php");
        }
        //Create the model object
        $modelObject = new $modelName ();

        if (!method_exists($modelObject, "__construct")) {
            trigger_error("Missing constructor, constructors can be empty, just make sure they are there.");
        } else {
            $modelObject->__construct();
        }

        if (method_exists($modelObject, "init"))
            $modelObject->init();

        //Link the model to the loader to load and initialize it
        self::$model =& $modelObject;
        self::$modelName = $modelName;

        //Load and initialize it into the controller as an object
        EmmaController::$instance->$modelName =& self::$model;

        return $ref =& self::$model;
    }

    public static function helper($paramModel, $path = null) {

    }

    /**
     * Instructs the controller to load and render a view
     *
     * @param string $paramView
     */
    public static function view($paramView)
    {

        if (!file_exists("views/" . $paramView)) {

            self::$controller->fourOhFour();

        } else {

            //Load a view
            self::$controller->initView($paramView);

        }

    }

    public static function setSnippet($snipName, $snipLocation)
    {
        $snipLocation = $snipLocation . ".php";
        EmmaController::$instance->setSnippet($snipName, $snipLocation);
    }

    /**
     * Instance control
     *
     * @return Loader
     */
    public static function getInstance()
    {

        return self::$instance === null
            ? self::$instance = new self
            : $ref =& self::$instance;

    }

}
