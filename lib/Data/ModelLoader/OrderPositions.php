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

        function addOrderPosition($itemsArray) {

            $myDB = new PDO('sqlite:data.sqlite3');

            $query = $myDB->prepare(
                'INSERT INTO orderPositions (id, orderId, articleName, articlePrice, quantity) VALUES (?, ?, ?, ?, ?)');
            $query->execute($itemsArray);


            // $query = "INSERT INTO %s (%s, %s, %s, %s, %s) VALUES (%i, %i, %s, %i, %i)";
            // $argumentArray = array($this->getTableName(), $this->getFields(), implode(",",$itemsArray));
            // $insert = $this->db->query($query, $argumentArray);
            // $insert->execute();

        }


    }