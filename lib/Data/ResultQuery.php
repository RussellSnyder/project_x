<?php

    class Data_ResultQuery implements Data_StatementFragment {
        protected $queries = [];

        static function createDefault() {
            return new Data_ResultQuery();
        }

        function __construct($queries = []) {
            if (!is_array($queries)) {
                $queries = [$queries];
            }
            $this->queries = $queries;
        }

        function buildStatementFragment() {
            if (empty($this->queries)) {
                return '';
            }

            return sprintf('WHERE %s', implode(' AND ', $this->getQueryAsArray()));
        }

        protected function getQueryAsArray() {
            $query = [];
            foreach ($this->queries as $key => $queryFragment) {
                if (!is_numeric($key)) {
                    $query[] = vsprintf("%s = '%s'", [$key, $queryFragment]);
                } else {
                    $query[] = $queryFragment;
                }
            }

            return $query;
        }
    }