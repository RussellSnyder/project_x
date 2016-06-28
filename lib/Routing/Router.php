<?php

class Routing_Router {

    /**
     * @param $server
     * @param $db
     * @return Routing_Route
     */
    static function loadRoute($server, $db) {
        $path = ltrim($server['PHP_SELF'], '/');

        $parts = explode('.', $path);
        $className = 'Routes_' . ucfirst($parts[0]);

        return new $className($db);
    }
}