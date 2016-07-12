<?php

    class Data_Models_Order extends Data_Model {
        function getCustomerName() {
            return $this->data['customer'];
        }

        /**
         * @return DateTime
         */
        function getDate() {
            $preFormatted = new DateTime($this->data['date'], new DateTimeZone('Europe/London'));
            return $preFormatted->format('d.m.y, H:i');
        }
    }