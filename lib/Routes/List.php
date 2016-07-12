<?php

class Routes_List extends Routing_Route {

    /**
     * @var Data_ModelLoader_Orders
     */
    private $orderLoader;

    private $ordersPagination;    
    private $ordersTotal;
    private $orderResults;
    private $ordersSort;

    /**
     * @var Data_ModelLoader_OrderPositions
     */
    private $orderPositionsLoader;

    private $orderPositionsPagination;    
    private $orderPositionsTotal;
    private $orderPositionsResults;
    private $orderPositionsSort;

    /**
     * @var array of Sum of Data_ModelLoader_OrderPositions on given id;
     * id ==> sum
     */
    private $orderSums = [];
    /**
     * Routes_List constructor.
     *
     * @param DB $db
     */
    function __construct(DB $db) {
        parent::__construct($db);

        // ORDERS
        $this->orderLoader = new Data_ModelLoader_Orders($db);
        $this->ordersTotal = $this->orderLoader->count();
        $this->ordersPagination = new Utilities_Pagination(['page', 'orders', 3], $this->ordersTotal); 
        $this->ordersSort = new Utilities_Sort('orders');

        // ORDERPOSITIONS
        $this->orderPositionsLoader = new Data_ModelLoader_OrderPositions($db);
        $this->orderPositionsTotal = $this->orderPositionsLoader->count();
        $this->orderPositionsPagination = new Utilities_Pagination(['page', 'orderPositions', 5], $this->orderPositionsTotal); 
        $this->orderPositionsSort = new Utilities_Sort('orderPositions');

    }


    private function getWholeSum($orderPositions) {
        $total_sum = 0;         
        foreach($orderPositions as $order_position) {
            $one_sum = $order_position->getSum();
            $total_sum = $total_sum + $one_sum; 
        }
        return money_format('%.2n', $total_sum);
    }

    private function getOrderSums($orders) {
        $sumsArray = [];
        foreach ($orders as $order) {
            $id = $order->getId();
            $order = $this->orderPositionsLoader->loadPositionsByOrderId($id);
            $sum = $this->getWholeSum($order);
            $this->sumsArray[$id] = $sum;
        }
        return $this->sumsArray;
    }

    function handle(Request $request, Response $response) {

        //ORDERS START
        $ordersResultsPerPage = $this->ordersPagination->getNumberOfResultsPerPage(3);
        $ordersOffset = $this->ordersPagination->calulateOffset(1);

        $ordersNumberOfResultsPerPageDropdown = $this->ordersPagination->createDropdown('Number Of Results Per Page', $this->ordersTotal);
 
        $ordersPagination = $this->ordersPagination->createPagination();

        $ordersSortOrderDropdown = $this->ordersSort->createDropdown('Display Results', 'orderdirection', ['ASC', 'DESC']);

        $ordersSortByDropdown = $this->ordersSort->createDropdown('Order Results By', 'orderby', ['id', 'customer', 'date', 'sum']);

        if ($this->ordersSort->getValue('ordersorderdirection') == 'ASC') {
            $orders = $this->orderLoader->load(
                Data_ResultQuery::createDefault(), 
                new Data_ResultOrder('id', Data_ResultOrder::ASC), 
                new Data_ResultLimit($ordersResultsPerPage, $ordersOffset)
            );            
        } else if ($this->ordersSort->getValue('ordersorderdirection') == 'DESC') {
            $orders = $this->orderLoader->load(
                Data_ResultQuery::createDefault(), 
                new Data_ResultOrder('id', Data_ResultOrder::DESC), 
                new Data_ResultLimit($ordersResultsPerPage, $ordersOffset)
            );            
        } 

        //ORDERS END

        //ORDERPOSITIONS START
        $orderPositionsResultsPerPage = $this->orderPositionsPagination->getNumberOfResultsPerPage();
        $orderPositionsOffset = $this->orderPositionsPagination->calulateOffset(1);

        $orderPositionsNumberOfResultsPerPageDropdown = $this->orderPositionsPagination->createDropdown('Number Of Results Per Page', $this->orderPositionsTotal);
 
        $orderPositionsPagination = $this->orderPositionsPagination->createPagination();

        $orderPositionsSortOrderDropdown = $this->orderPositionsSort->createDropdown('Display Results', 'orderdirection', ['ASC', 'DESC']);

        $orderPositionsSortByDropdown = $this->orderPositionsSort->createDropdown('Order Results By', 'orderby', ['id', 'orderId', 'articleName', 'articlePrice', 'quantity']);

        if ($this->orderPositionsSort->getValue('orderPositionsorderdirection') == 'ASC') {
            $orderPositions = $this->orderPositionsLoader->load(
                Data_ResultQuery::createDefault(), 
                new Data_ResultOrder('id', Data_ResultOrder::ASC), 
                new Data_ResultLimit($orderPositionsResultsPerPage, $orderPositionsOffset)
            );            
        } else {
            $orderPositions = $this->orderPositionsLoader->load(
                Data_ResultQuery::createDefault(), 
                new Data_ResultOrder('id', Data_ResultOrder::DESC), 
                new Data_ResultLimit($orderPositionsResultsPerPage, $orderPositionsOffset)
            );            
        }  

        // create array of sums
        $sums = $this->getOrderSums($orders);

        $renderJob = new Templating_RenderJob('list', [
            'headline' => 'Orders',
            'orders' => $orders,
            'ordersTotal' => $this->ordersTotal,
            'ordersPagination' => $ordersPagination,
            'ordersNumberOfResultsPerPageDropdown' => $ordersNumberOfResultsPerPageDropdown,
            'ordersSortOrderDropdown' => $ordersSortOrderDropdown,
            'ordersSortByDropdown' => $ordersSortByDropdown,
            'headline2' => 'Order Positions',
            'orderPositions' => $orderPositions,
            'orderPositionsTotal' => $this->orderPositionsTotal,
            'orderPositionsPagination' => $orderPositionsPagination,
            'orderPositionsNumberOfResultsPerPageDropdown' => $orderPositionsNumberOfResultsPerPageDropdown,
            'orderPositionsSortOrderDropdown' => $orderPositionsSortOrderDropdown,
            'orderPositionsSortByDropdown' => $orderPositionsSortByDropdown,
            'sums' => $sums,
        ]);
        
        $response->setRenderJob($renderJob);
    }
}