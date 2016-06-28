<?php

    abstract class Data_Model {

        protected $id;
        protected $data = [];

        function __construct($id = null) {
            $this->id = $id;
        }

        function setData(Array $data) {
            $this->data = $data;
            return $this;
        }

        function getId() {
            return $this->id;
        }

        function getData() {
            return $this->data;
        }
    }