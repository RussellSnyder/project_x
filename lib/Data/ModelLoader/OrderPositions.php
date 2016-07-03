<?php

    class Data_ModelLoader_OrderPositions extends Data_ModelLoader {
        protected $tableName = 'orderPositions';
        protected $selectionField = 'id';
        protected $fields = ['id', 'orderId', 'articleName', 'articlePrice', 'quantity'];
        protected $model = Data_Models_OrderPosition::class;

        /**
         * takes a order id and returns a number of order positions
         *
         * @param $orderId
         *
         * @return Data_Models_OrderPosition[]
         */
        function loadPositionsByOrderId($orderId) {
            return $this->load(new Data_ResultQuery(['orderId' => $orderId]), new Data_ResultOrder('id', Data_ResultOrder::ASC));
        }

        /**
         * takes a order id and returns the sum of the order
         *
         * @param $orderId
         *
         * @return Data_Models_OrderPosition[]
         */
        // function loadOrderSum($orderId) {
        //     return $this->load(new Data_ResultQuery(['orderId' => $orderId]), new Data_ResultOrder('id', Data_ResultOrder::ASC),
        //         new Data_ResultLimit(10000),
        //         new Data_ResultGroupby($orderId));
        // }


    }