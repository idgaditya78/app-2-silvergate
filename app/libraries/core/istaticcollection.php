<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * IStaticCollection interface is an encapsulator for a collection
 * @author Aditya Aida Purwa
 */
interface IStaticCollection {        
    static function clear();    
    static function get($index);
    static function set($index, $value);
}