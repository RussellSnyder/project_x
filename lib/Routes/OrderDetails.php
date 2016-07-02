<?php

class Routes_OrderDetails extends Routing_Route {

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

    function handle(Request $request, Response $response) {
        $orderToGet = $_GET['id'];
        $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId($orderToGet);
        // $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        $renderJob = new Templating_RenderJob('orderdetails', [
            'orderPositions' => $orderPositions
            ]);
        
        $response->setRenderJob($renderJob);
    }
}