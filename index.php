<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once('_autoload.php');

if (preg_match('/\.(html)/', $_SERVER["REQUEST_URI"])) {
    Bootstrap::initiate();
} else {
	header('Location: '. '/list.html');
    //causes the built-in webserver to serve the resource directly (e.g. static resources like style sheets, images or javascript files)
    return false;
}

