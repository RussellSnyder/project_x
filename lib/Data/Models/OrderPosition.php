<?php

    class Data_Models_OrderPosition extends Data_Model {
        /**
         * @var Data_Models_Order
         */
        protected $order;

        /**
         * @return Integer
         */
        function getOrderId() {
            return $this->data['orderId'];
        }

        /**
         * @return String
         */
        function getArticleName() {
            return $this->data['articleName'];
        }

        /**
         * @return Float
         */
        function getArticlePrice() {
            return $this->data['articlePrice'];
        }

        /**
         * @return Integer
         */
        function getQuantity() {
            return $this->data['quantity'];
        }
    }