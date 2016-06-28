<?php

    class Data_ModelLoader_Orders extends Data_ModelLoader {
        protected $tableName = 'orders';
        protected $selectionField = 'id';
        protected $fields = ['id', 'customer', 'date'];
        protected $model = Data_Models_Order::class;
    }