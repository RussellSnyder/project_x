<?php

class Routes_Test extends Routing_Route {

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
        $orders = $this->orderLoader->loadModelsByLimit(25);
        $orderPositions = $this->orderPositionsLoader->loadModelsByLimit(25);
        // $orderPositions = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        
        $renderJob = new Templating_RenderJob('test', [
            'headline' => 'Tests',
            'orders' => $orders,
            'orderPositions' => $orderPositions
            ]);
        
        $response->setRenderJob($renderJob);
    }
}