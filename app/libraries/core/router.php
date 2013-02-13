<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * Router class used to route specific request to specific controller
 * @author Aditya Aida Purwa
 */
class Router {

    /**
     * Create new instance of the Request class    
     */
    function __construct() {
        
    }
    
    /**
     * Route the request to specific controller
     * @param Request $request The request to route
     */
    function route(Request $request){
        //Separate path by / and remove ending /
        $paths = explode('/', rtrim($request->getUrl()->getPath(), '/'));        
        //Determines the default
        $controllerFolder = $paths[0] ? $paths[0] : "main";
        //Non main folder uses FolderMain as the default controller
        if($controllerFolder === "main"){
            $controllerName = $paths[1] ? $paths[1] : "main";       
        }else{
            $controllerName = $paths[1] ? $paths[1] : $controllerFolder."main";
        }
        $methodName = $paths[2] ? $paths[2] : "main";
        $args = array_slice($paths, 3);
        
        if(file_exists(FOLDER_CONTROLLERS.S.$controllerFolder.S.$controllerName.".php")){
            $controller = new $controllerName($request);            
            if(method_exists($controller,$methodName)){
                $controller->{$methodName}($args);
            }else{
                header("location: ".REDIRECT_ERROR002);
            }
        }else{
            header("location: ".REDIRECT_ERROR001);
        }
        
    }

}