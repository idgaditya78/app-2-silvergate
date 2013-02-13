<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Controller class is the one that responsible for managing the response process
 * All method specified must be protected to allow authenticator hooks request
 * @author Aditya Aida Purwa
 */
class Controller {

    /**
     * The view used to render page
     * @var View
     */
    var $view;
    /**
     * The request passed to this controller
     * @var Request
     */
    var $request;
    /**
     * A function that will be called each method is called
     * Return true to allow access, return false to block access
     * @var function
     */
    protected $authenticator;

    /**
     * Create new instance of the Controller class
     */
    function __construct(Request $request) {
        Session::start();
        $this->view = new View();
        $this->request = $request;

    }

    /**
     * Used to hook any request for method call to authenticator
     * @param string $name the caller name
     * @param array $arguments the arguments passed to caller
     */
    public final function __call($name, $arguments) {
        //If authenticator exists, call it to specify the access priviliges
        if($this->authenticator){
            if($this->authenticator->call(array($name,$arguments))){
                $this->{$name}($arguments);
            }else{
                header("location: ".REDIRECT_ERROR005);
            }
        }else{
            $this->{$name}($arguments);
        }
    }

    /**
     * Method called when there is no method specified
     */
    protected function main($args=null){

    }

}