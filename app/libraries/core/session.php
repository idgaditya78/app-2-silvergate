<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Session class manages the session used to store data
 * @author Aditya Aida Purwa
 */
class Session implements IStaticCollection{

    /**
     * Start the session
     */
    public static function start(){
        @session_start();
    }
    
    /**
     * Stop the session
     */
    public static function stop(){
        @session_destroy();        
    }
    
    /**
     * Set the value on the session
     * @param object $index the index
     * @param object $value the value
     */
    public static function set($index, $value) {
        $_SESSION[$index] = $value;
    }
    
    /**
     * Get the value on the session
     * @param object $index
     * @return type 
     */
    public static function get($index) {
        return $_SESSION[$index];
    }
    
    /**
     * Clear the session
     */
    public static function clear() {
        $_SESSION = null;
    }
    
    

}