<?php

    class Data_Models_Order extends Data_Model {
        function getCustomerName() {
            return $this->data['customer'];
        }

        /**
         * @return DateTime
         */
        function getDate() {
            return new DateTime($this->data['date'], new DateTimeZone('Europe/London'));
        }
    }