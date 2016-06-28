<?php

class Request {
    function query() {
        return $_GET;
    }

    function body() {
        return $_POST;
    }
}