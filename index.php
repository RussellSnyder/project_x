<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once('_autoload.php');

if (preg_match('/\.(html)/', $_SERVER["REQUEST_URI"])) {
    Bootstrap::initiate();
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
else 
{
    //causes the built-in webserver to serve the resource directly (e.g. static resources like style sheets, images or javascript files)
    $message = '';
	$message = 'It appears you entered <b>"' . ltrim(urldecode($_SERVER["REQUEST_URI"]), '/') ."\"</b> into the url bar.... <br><br>....I'm afraid I don't know what you are looking for :-( <br><br><h3>But I did return a string ;-)</h3>";
	echo $message;
    // return false;
}

