<?php

class Routes_AddOrderPosition extends Routing_Route {

    /**
     * @var Data_ModelLoader_OrderPositions
     */
    private $orderPositionsLoader;
    
    /**
     * Routes_List constructor.
     *
     * @param DB $db
     */
    function __construct(DB $db) {
        parent::__construct($db);

        $this->orderPositionsLoader = new Data_ModelLoader_OrderPositions($db);


    }

    function addData($model) {
        // $this->orderPositionsLoader->setModel($model);
    }

    private function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function prepareFormData() {
    	$id = $this->test_input($_POST['id']);
    	$name = $this->test_input($_POST['name']);
    	$price = $this->test_input($_POST['price']);
    	$quantity = $this->test_input($_POST['quantity']);
    	return array($name, $price, $quantity, $id);
    }



    function handle(Request $request, Response $response) {
		$addMe = $this->prepareFormData();
		$this->addData($addMe);
        // $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        $renderJob = new Templating_RenderJob('addorderposition', [
	    	'name' => $addMe[0],
	    	'price' => $addMe[1],
	    	'quantity' => $addMe[2],
	    	'id' => $addMe[3]
        ]);
        
        $response->setRenderJob($renderJob);
    }
}