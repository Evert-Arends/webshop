<?php

/****************************************************
 *            Application Configuration             *
 ****************************************************/

// Set debug mode
define("DEBUG_MODE", true);

// Set the default controller
define("DEFAULT_CONTROLLER", "home");

// Debug mode
if (DEBUG_MODE)
    ini_set("display_errors", "on");
else
    ini_set("display_errors", "off");

/****************************************************
 *                    Database                      *
 ****************************************************/

// Database Switch
define("DB", true);

// Database Details
define("DB_HOST", "37.48.109.246");
define("DB_NAME", "webshop");
define("DB_USERNAME", "webshop");
define("DB_PASSWORD", "!webshop!");
// If you create tables with lowercase and underscores, set this to true.
define("DB_TABLES_LOWERCASE", true);

/****************************************************
 *                    Autoloader                    *
 ****************************************************/

AutoLoader::$autoloadModels = array();

/****************************************************
 *                    Constants                     *
 ****************************************************/

define("TITLE", "EmmaPHP Framework");
define("BASEPATH", "http://localhost:8080/school/webshop/");
define("APPPATH", BASEPATH . "application/");

// If you want EmmaPHP to be in charge of authenticating a user.
// This will be used within middleware
define("AUTH", true);

//DEFINE ANY CONSTANTS BELOW

