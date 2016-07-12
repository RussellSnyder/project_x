<?php

class Routes_AddOrderPosition extends Routing_Route {

    /**
     * @var Data_ModelLoader_OrderPositions
     */
    private $orderPositionsLoader;

    /**
     * @var Utilities_SantizeData
     */
    private $sanitizeData;
    

    // current order id being viewed
    private $orderId;

    /**
     * Routes_List constructor.
     *
     * @param DB $db
     */
    function __construct(DB $db) {
        parent::__construct($db);

        $this->orderPositionsLoader = new Data_ModelLoader_OrderPositions($db);

        $this->sanitizeData = new Utilities_SanitizeData();

        $this->orderId = $this->sanitizeData->positiveNumber(
                          $this->sanitizeData->basic($_POST['orderId']));



    }

    function prepareFormData() {
      $name = $this->sanitizeData->basic($_POST['name']);
      $name = $this->sanitizeData->string($name);
      $price = $this->sanitizeData->basic($_POST['price']);
      $price = $this->sanitizeData->positiveNumber($price);      
      $quantity = $this->sanitizeData->basic($_POST['quantity']);
      $quantity = $this->sanitizeData->positiveNumber($quantity);
      return array( NULL, $this->orderId, $name, $price, $quantity );
    }


    function addData($model) {
        $this->orderPositionsLoader->addOrderPosition($model);
    }

    function handle(Request $request, Response $response) {
		$addMe = $this->prepareFormData();
		$this->addData($addMe);
    $id = $_POST['orderId'];
    header('Location: '. '/orderdetails.html?id=' . $id);
    }
}