<?php

class Db extends PDO {
    function __construct($file) {
        parent::__construct('sqlite:' . $file);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    function query($statement, $arguments = []) {
        return parent::query(vsprintf($statement, $arguments));
    }

    function getScalarArray($statement, $arguments) {
        $data = $this->query($statement, $arguments);
        $data->execute();

        $scalars = [];
        foreach ($data->fetchAll() as $row) {
            $scalars[] = array_shift($row);
        }
        return $scalars;
    }
}