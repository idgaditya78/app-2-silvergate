<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Database class is class that extends from PDO to create database connection
 * @author Aditya Aida Purwa
 */
class Database extends PDO {

    /**
     * Create a new instance of the Database class
     * Will only construct its parent when the USEDATABSE is turned on
     */
    function __construct() {
        if(USEDATABASE){
            parent::__construct(DBDRIVER.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
        }
    }

}