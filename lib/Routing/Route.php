<?php

abstract class Routing_Route {
    /* @var Db */
    protected $db;

    function __construct(Db $db) {
        $this->db = $db;
    }

    abstract function handle(Request $request, Response $response);
}