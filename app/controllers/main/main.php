<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Main class is the primary controller that will be called when there is no
 * controller specified. There must only one main class. Default page in other
 * controller sub-folders must be prefixed with the parent folder name.
 *
 * Example : There is a sub-folder in controller folder named `user`. To create
 * default page for the folder, the UserMain class name is used.
 * @author Aditya Aida Purwa
 */
class Main extends Controller{

    function __construct($request) {
        parent::__construct($request);        
    }

    protected function main($args=null){
        parent::main();
        $this->view->render("main");
    }

}