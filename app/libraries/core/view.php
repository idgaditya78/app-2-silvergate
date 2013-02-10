<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * View class is used to determines the display of a page
 * @author Aditya Aida Purwa
 */
class View {

    /**
     * Variables that will be extracted during render
     * @var array
     */
    private $vars = array();
    
    /**
     * Create a new instance of the View class
     */
    function __construct() {
        
    }
    
    /**
     * Used to hooks variable assignment so it can be passed to render to get
     * extracted
     * @param string $name The name of the variable
     * @param object $value The value of the variable
     */
    function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    
    /**
     * Render the page, note that variable passed to this view object
     * will be extract
     * @param string $page the page to render, located in app/views/ folder
     */
    function render($page){
        extract($this->vars);
        require_once FOLDER_VIEWS.S.$page.".php";
    }

}