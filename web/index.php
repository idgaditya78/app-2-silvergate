<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * @author Aditya Aida Purwa
 * ----------------------------------------
 * Purpose of this file is to do a set-up process on a request
 */

//Load the core functionalities of the framework
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR."core".DIRECTORY_SEPARATOR."core.php";

//Set-up request processing
$request = new Request("http://". $_GET['url']);

$router = new Router();
$router->route($request);