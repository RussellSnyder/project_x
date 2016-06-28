<?php

    class Data_ResultLimit implements Data_StatementFragment {
        protected $limit;
        protected $offset;

        static function createDefault() {
            return new Data_ResultLimit(null);
        }

        function __construct($limit, $offset = 0) {
            $this->limit = $limit;
            $this->offset = $offset;
        }

        function buildStatementFragment() {
            if (!$this->limit) {
                return '';
            }

            return vsprintf('LIMIT %d, %d', [$this->offset, $this->limit]);
        }
    }