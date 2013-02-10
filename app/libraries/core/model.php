<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Model class responsible for interfacing the databse query/access
 * @author Aditya Aida Purwa
 */
class Model {

    /**
     * The database object used to access database
     * @var Database
     */
    var $db;
    
    function __construct() {
        $this->db = new Database();
    }

}