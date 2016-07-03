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


    private function getWholeSum($orderPositions) {
        $total_sum = 0;         
        foreach($orderPositions as $order_position) {
            $one_sum = $order_position->getSum();
            $total_sum = $total_sum + $one_sum; 
        }
        return $total_sum;
    }
    
    function handle(Request $request, Response $response) {
        $orderToGet = $_GET['id'];
        $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId($orderToGet);
        $grandTotal = $this->getWholeSum($orderPositions);
        // $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        $renderJob = new Templating_RenderJob('orderdetails', [
            'orderPositions' => $orderPositions,
            'grandTotal' => $grandTotal 
            ]);
        
        $response->setRenderJob($renderJob);
    }
}