<?php

class Routes_List extends Routing_Route {

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

    function getWholeSum($orderPositions) {
        $total_sum = 0;         
        foreach($orderPositions as $order_position) {
            $one_sum = $order_position->getSum();
            $total_sum = $total_sum + $one_sum; 
        }
        return $total_sum;
    }

    function handle(Request $request, Response $response) {
        $orders = $this->orderLoader->loadModelsByLimit(25);
        $orderPositions = $this->orderPositionsLoader->loadModelsByLimit(25);
        $position1 = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        $position2 = $this->orderPositionsLoader->loadPositionsByOrderId(2);
        $position3 = $this->orderPositionsLoader->loadPositionsByOrderId(3);
        $sums = array($this->getWholeSum($position1), $this->getWholeSum($position2), $this->getWholeSum($position3));

        $renderJob = new Templating_RenderJob('list', [
            'headline' => 'Orders',
            'orders' => $orders,
            'headline2' => 'Order Positions',
            'orderPositions' => $orderPositions,
            'sums' => $sums
        ]);
        
        $response->setRenderJob($renderJob);
    }
}