<?php

    class Data_ResultOrder implements Data_StatementFragment {
        const DESC = 'DESC';
        const ASC = 'ASC';

        protected $orderField;
        protected $orderDirection;

        static function createDefault() {
            return new Data_ResultOrder(null);
        }

        function __construct($orderField = null, $orderDirection = self::DESC) {
            $this->orderField = $orderField;
            $this->orderDirection = $orderDirection;
        }

        public function getOrderDirection() {
            return $this->orderDirection;
        }

        public function setOrderDirection($orderDirection) {
            $this->orderDirection = $orderDirection;
        }

        public function getOrderField() {
            return $this->orderField;
        }

        public function setOrderField($orderField) {
            $this->orderField = $orderField;
        }

        function buildStatementFragment() {
            if (!$this->orderField) {
                return '';
            }
            return vsprintf('ORDER BY %s %s', [$this->orderField, $this->orderDirection]);
        }
        
    }