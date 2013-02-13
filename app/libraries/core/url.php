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
     * Matches from the parsing of the url
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
        return $this->_urlmatch["scheme"];
    }
    
    /**
     * Get the path used in the URL
     * @return string
     */
    function getPath(){
        return $this->_urlmatch["path"];
    }
    
    /**
     * Get the query string in the URL
     * @return string
     */
    function getQueryString(){
        return $this->_urlmatch["query"];
    }
    
    /**
     * Get the host name in the URL
     */
    function getHost(){
        return $this->_urlmatch["host"];
    }
    
    /**
     * Parse the url to this instance
     * @param type $url 
     */
    private function parse($url){                
        $this->_urlmatch = parse_url($url);
    }

}