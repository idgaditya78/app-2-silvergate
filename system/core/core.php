<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * @author Aditya Aida Purwa
 * ----------------------------------------
 * Purpose of this file is to define the basic information, configuration
 * and functionalities for the APP 2.0 - SilverGate framework
 */

//APP
define("APP",true);
define("APP_VERSION","2.0");
define("APP_NAME","SilverGate");

//File System
define("ROOT", dirname(dirname(dirname(__FILE__))));
define("S", DIRECTORY_SEPARATOR);
//Path
define("FOLDER_APP", ROOT.S."app");
define("FOLDER_SYSTEM", ROOT.S."system");
//APP Folder
define("FOLDER_CONFIGURATIONS", FOLDER_APP.S."configurations");
define("FOLDER_CONTROLLERS", FOLDER_APP.S."controllers");
define("FOLDER_LIBRARIES", FOLDER_APP.S."libraries");
define("FOLDER_CORELIBRARIES", FOLDER_APP.S."libraries".S."core");
define("FOLDER_MODELS", FOLDER_APP.S."models");
define("FOLDER_VIEWS", FOLDER_APP.S."views");
//Debug Configuration
error_reporting(E_ERROR);

//Requiring other core files
require_once "common.php";
//Requiring other configuration
require_once FOLDER_CONFIGURATIONS.S."database.php";

//Used to search controller inside sub-directories of controller
function searchController($name,$rootdir){
    $dir = dir($rootdir);
    //Read recursively, pass . and .., if the name of the file is equal, require it
    while($fname = $dir->read()){
        if($fname === ".") continue;
        if($fname === "..") continue;
        if(is_file($rootdir.S.$fname)){
            if($name.".php" === $fname){                
                require_once $rootdir.S.$fname;
            }
        }else if(is_dir($rootdir.S.$fname)){
            searchController($name, $rootdir.S.$fname);
        }
    }
}

//Used to auto load a class
function __autoload($name){
    $name = strtolower($name);
    if(file_exists(FOLDER_CORELIBRARIES.S.$name.".php")){
        require_once FOLDER_CORELIBRARIES.S.$name.".php";
    }
    else if(file_exists(FOLDER_LIBRARIES.S.$name.".php")){
        require_once FOLDER_LIBRARIES.S.$name.".php";
    }    
    else if(file_exists(FOLDER_MODELS.S.$name.".php")){
        require_once FOLDER_MODELS.S.$name.".php";
    }else{
        //Used since there may some class that is placed in sub directories
        searchController($name, FOLDER_CONTROLLERS);
    }    
}