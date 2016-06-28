<?php

function __autoload($classname) {
    $parts = explode('_', $classname);
    $path = getcwd() . '/lib/' . implode('/', $parts) . '.php';

    require_once($path);
}