<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * UserIDAuthenticator class is the implementation to authenticate user
 * based on its Session of `user_id`
 * @author Aditya Aida Purwa
 */
class UserIDAuthenticator extends Authenticator {

    /**
     * Initialize a new instance of the class UserIDAuthenticator
     */
    function __construct() {
        
    }
    
    /**
     * Check the user_id key on session, if it exists, page is accessible
     * @param array $args
     * @return boolean 
     */
    public function call($args) {
        if(Session::get("user_id")){
            return true;
        }
        return false;
    }

}