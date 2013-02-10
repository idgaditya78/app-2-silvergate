<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Error class is used to display error
 * @author Aditya Aida Purwa
 */
class Error extends Controller{

    function __construct($request) {
        parent::__construct($request);
    }
        
    function main($args=null) {
        parent::main();
    }
    
    function pageNotFound(){
        echo "404 - Page Not Found";
    }
    
    function forbidden(){
        echo "Forbiden";
    }

}