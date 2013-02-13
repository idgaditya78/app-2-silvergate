<?php

/**
 * Copyright 2013 (C) - ION Developer Group
 * @author Aditya Aida Purwa
 * ----------------------------------------
 * Purpose of this file is to manage the configuration for redirection on error,
 * etc.
 */

//Error Redirection
//THIS IS NOT AN HTTP ERROR. INSTEAD, ITS AN APP_ERROR - SEE common.php
//Redirection is directed to controller, use relative path to host (/folder/ctrl/file)
//By default, error controller is located on `others` folder with pre-defined
//APP message
define("REDIRECT_ERROR001", "/others/error/nocontrol");
define("REDIRECT_ERROR002", "/others/error/nohandle");
define("REDIRECT_ERROR003", "/others/error/noview");
define("REDIRECT_ERROR004", "/others/error/notfound");
define("REDIRECT_ERROR005", "/others/error/forbidden");
