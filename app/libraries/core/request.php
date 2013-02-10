<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Request class contains the data specified by the client request
 * @author Aditya Aida Purwa
 */
class Request {

    /**
     * The URL that is requested
     * @var URL
     */
    private $_url;
    
    /**
     * Create new instance of the Request class
     * @param URL $url The URL of the request
     */
    function __construct($url) {
        $this->_url = new URL($url);
    }
    
    /**
     * Get the url that is requested
     * @return URL
     */
    function getUrl(){
        return $this->_url;
    }
    
    /**
     * Get the query string
     * @param object $name The index of the query string
     * @return string 
     */
    function getQuery($name){
        return $_GET[$name];
    }
    
    /**
     * Get the POST data from a form request
     * @param object $name The index of the form POST field
     * @return string
     */
    function getForm($name){
        return $_POST[$name];
    }
        

}