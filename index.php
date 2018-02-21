<?php

/*
 * EmmaPHP Model View Controller Framework.
 * @author Bob Desaunois
 * 
 * @version v1.3.0
 */

// Define version
define ("VERSION", "v1.3.0");
define ("WEBSHOP_NAME", "Mijn Baby Wereld!");

// Include core
require_once ("system/components/core.php");
require_once ("system/components/router.php");

// Implement routing engine


$router = new Router();

// Run core
new Core ($router->route());