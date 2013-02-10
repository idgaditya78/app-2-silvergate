<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Authenticator class used to authenticate client before accessing page. This 
 * class is abstract, and must implements the ICallable inteface
 * @author Aditya Aida Purwa
 */
abstract class Authenticator implements ICallable{

    /**
     * Create new instance of the class Authenticator
     */
    function __construct() {
        
    }
    
    /**
     * The authentication process happens here
     * @param array $args : [0] = Caller, [2] = Arguments
     * @return boolean True means page access is alloed, false mean access is blocked
     */
    public abstract function call($args);    

}