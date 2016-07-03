<?php

    class Data_ResultGroupby implements Data_StatementFragment {
        protected $groupby;

        static function createDefault() {
            return new Data_ResultGroupby(null);
        }

        function __construct($groupby) {
            $this->groupby = $groupby;
        }

        function buildStatementFragment() {
            if (!$this->groupby) {
                return '';
            }

            return vsprintf('GROUP BY %s', [$this->groupby]);
        }
    }