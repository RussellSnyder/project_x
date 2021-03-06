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

        /**
         * @return Integer
         */
        function getSum() {
            $order_sum = $this->data['quantity'] * $this->data['articlePrice']; 
            return money_format('%.2n', $order_sum);
            // return $order_sum;
        }

    }