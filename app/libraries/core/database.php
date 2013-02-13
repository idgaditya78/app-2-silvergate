<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Database class is class that extends from PDO to create database connection
 * @author Aditya Aida Purwa
 */
class Database extends PDO {

    
    protected $_databaseName = "No Database Selected";
    /**
     * Get the name of the database
     * @return string
     */
    public function getDatabaseName(){
        return $this->_databaseName;
    }
    /**
     * Create a new instance of the Database class
     * Will only construct its parent when the USEDATABSE is turned on
     */
    function __construct($databaseName="") {
        if(USEDATABASE){
            if(!$databaseName){
                $databaseName = DBNAME;
            }
            parent::__construct(DBDRIVER.":host=".DBHOST.";dbname=".$databaseName, DBUSER, DBPASS);
        }
    }
}