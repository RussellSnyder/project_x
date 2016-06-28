<?php

    abstract class Data_ModelLoader {
        /**
         * @var Db
         */
        protected $db;

        protected $tableName;
        protected $selectionField;
        protected $fields = [];

        protected $model;

        function __construct(Db $db) {
            $this->db = $db;
        }

        /**
         * @param $resultLimit
         * @param int $offset
         * @return Data_Model[]
         */
        function loadModelsByLimit($resultLimit, $offset = 0) {
            if (is_numeric($resultLimit)) {
                $resultLimit = new Data_ResultLimit($resultLimit, $offset);
            }
            return $this->load(Data_ResultQuery::createDefault(), null, $resultLimit);
        }

        /**
         * @param Data_ResultQuery $resultQuery
         * @return Data_Model
         */
        function loadOne(Data_ResultQuery $resultQuery) {
            $many = $this->load($resultQuery);
            return array_shift($many);
        }

        /**
         * @param Data_ResultQuery $resultQuery
         * @param Data_ResultOrder $resultOrder
         * @param Data_ResultLimit $resultLimit
         * @return Data_Model[]
         * @throws Exceptions_ModelLoaderException
         */
        function load(Data_ResultQuery $resultQuery, Data_ResultOrder $resultOrder = null, Data_ResultLimit $resultLimit = null) {
            if (!($resultOrder instanceof Data_ResultOrder)) {
                $resultOrder = Data_ResultOrder::createDefault();
            }
            if (!($resultLimit instanceof Data_ResultLimit)) {
                $resultLimit = Data_ResultLimit::createDefault();
            }

            return $this->loadModelsByKeys($this->db->getScalarArray('SELECT %s FROM %s %s %s %s', [
                $this->getSelectionField(),
                $this->getTableName(),
                $resultQuery->buildStatementFragment(),
                $resultOrder->buildStatementFragment(),
                $resultLimit->buildStatementFragment()
            ]));
        }

        /**
         * @param array $keys
         * @return Data_Model[]
         * @throws Exceptions_ModelLoaderException
         */
        function loadModelsByKeys(Array $keys) {
            if (!isset($this->tableName) || !isset($this->selectionField) || empty($this->fields)) {
                throw new Exceptions_ModelLoaderException('Cannot load model, either table name, selection field or fields are unset');
            }

            if (empty($keys)) {
                return [];
            }

            $data = $this->db->query(sprintf("SELECT %s FROM %s WHERE %s",
                $this->getFields(),
                $this->getTableName(),
                $this->buildExplicitWhereStatement($keys)
            ));

            $models = [];
            $data->execute();
            foreach ($data->fetchAll(PDO::FETCH_ASSOC) as $key => $row) {
                $models[] = $this->getModel($row[$this->getSelectionField()])
                    ->setData($row);
            }

            return $models;
        }

        protected function getFields() {
            $fields = $this->fields;
            if (!in_array($this->getSelectionField(), $fields)) {
                array_unshift($fields, $this->getSelectionField());
            }

            return implode(', ', $this->fields);
        }

        protected function getTableName() {
            return $this->tableName;
        }

        protected function getSelectionField() {
            return $this->selectionField;
        }

        protected function prepareKeys(Array $keys) {
            $preparedKeys = Array();
            foreach ($keys as $key) {
                $preparedKeys[] = (int) $key;
            }

            return $preparedKeys;
        }

        protected function buildExplicitWhereStatement(Array $keys) {
            $statements = $this->getImplicitWhereStatements();
            $preparedKeys = $this->prepareKeys($keys);
            if (!is_array($statements)) {
                $statements = [$statements];
            }

            array_unshift($statements,
                (count($preparedKeys) > 1)
                    ? sprintf('%s IN(%s)', static::getSelectionField(), implode(',', $preparedKeys))
                    : sprintf('%s = %d', static::getSelectionField(), $preparedKeys[0])
            );

            return implode(' AND ', $statements);
        }

        protected function setModel($model) {
            $this->model = $model;
        }

        /**
         * @param mixed $key
         * @return Data_Model
         * @throws Exceptions_ModelLoaderException
         */
        protected function getModel($key) {
            if (is_null($this->model)) {
                throw new Exceptions_ModelLoaderException('Useless ModelLoader without model declaration');
            }
            return new $this->model($key);
        }

        protected function getImplicitWhereStatements() {
            return [];
        }


    }