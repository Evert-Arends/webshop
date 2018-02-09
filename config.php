<?php

/****************************************************
 *            Application Configuration             *
 ****************************************************/

// Set debug mode
define("DEBUG_MODE", true);

// Set the default controller
define("DEFAULT_CONTROLLER", "index");

// Debug mode
if (DEBUG_MODE)
    ini_set("display_errors", "on");
else
    ini_set("display_errors", "off");

/****************************************************
 *                    Database                      *
 ****************************************************/

// Database Switch
define("DB", false);

// Database Details
define("DB_HOST", "programmeerbazen.nl");
define("DB_NAME", "webshop");
define("DB_USERNAME", "webshop");
define("DB_PASSWORD", "!webshop!");

/****************************************************
 *                    Autoloader                    *
 ****************************************************/

AutoLoader::$autoloadModels = array();

/****************************************************
 *                    Constants                     *
 ****************************************************/

define("TITLE", "EmmaPHP Framework");
define("BASEPATH", "http://localhost/school/webshop/");
define("APPPATH", BASEPATH . "application/");

//DEFINE ANY CONSTANTS BELOW
