<?php

class Routes_AddOrderPosition extends Routing_Route {

    /**
     * @var Data_ModelLoader_Orders
     */
    private $orderLoader;

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

        $this->orderLoader = new Data_ModelLoader_Orders($db);
        $this->orderPositionsLoader = new Data_ModelLoader_OrderPositions($db);


    }

    function addData($model) {
        // $this->orderPositionsLoader->setModel($model);
    }

    function prepareFormData() {
    	$id = $_POST['id'];
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$quantity = $_POST['quantity'];
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