<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * URL class is used to store and parse URL
 * @author Aditya Aida Purwa
 */
class URL {

    /**
     * The url
     * @var string
     */
    private $_url = "";
    /**
     * Matches Ffrom the parsing of the url
     * @var array
     */
    private $_urlmatch = array();
    
    /**
     * Create a new instance of the URL class
     * @param string $url The url
     */
    function __construct($url) {
        $this->_url = $url;
        $this->parse($this->_url);
    }
    
    /**
     * Get the protocol used in the URL
     * @return string
     */
    function getProtocol(){
        return $this->_urlmatch[1];
    }
    
    /**
     * Get the path used in the URL
     * @return string
     */
    function getPath(){
        return $this->_urlmatch[2];
    }
    
    /**
     * Get the query string in the URL
     * @return string
     */
    function getQueryString(){
        return $this->_urlmatch[3];
    }
    
    /**
     * Parse the url to this instance
     * @param type $url 
     */
    private function parse($url){                
        preg_match("/(.+):\/{2,3}(.+)\??(.+)?/i", $url, $this->_urlmatch);        
    }

}