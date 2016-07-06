<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once('_autoload.php');

if (preg_match('/\.(html)\.(raw)/', $_SERVER["REQUEST_URI"])) 
{
    Bootstrap::initiate('nobase');
} 
else if (preg_match('/\.(html)/', $_SERVER["REQUEST_URI"])) 
{
    Bootstrap::initiate('base');
} 
else if(preg_match('/\/$/', $_SERVER["REQUEST_URI"])) 
{
	header('Location: '. '/list.html');		
} 
else if (preg_match('/\.htm$/', $_SERVER["REQUEST_URI"]) ) 
{
		header('Location: ' . $_SERVER["REQUEST_URI"]);		
		return false;
} 
else if (preg_match('/\/string:/', $_SERVER["REQUEST_URI"]) ) 
{
    //causes the built-in webserver to serve the resource directly (e.g. static resources like style sheets, images or javascript files)
    $message = '';
	$message = 'You entered the string<b>"' . ltrim(urldecode($_SERVER["REQUEST_URI"]), '/string:') ."\"</b> into the url bar....";
	echo $message;
    // return false;

}
else 
{
		header('Location: ' . '/404.html');		
		return false;
}

