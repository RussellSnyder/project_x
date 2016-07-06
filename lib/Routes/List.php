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
     * @
     */
    private $numTotalResults = 25;
    private $resultsPerPage = 3;

    private $orderResults;

    /**
     * Routes_List constructor.
     *
     * @param DB $db
     */
    function __construct(DB $db) {
        parent::__construct($db);

        $this->orderLoader = new Data_ModelLoader_Orders($db);
        $this->orderPositionsLoader = new Data_ModelLoader_OrderPositions($db);

        $this->orderResults = new Data_ResultOrder();
        $this->orderResults->setOrderDirection('ASC');
        $this->orderResults->setOrderField('customer');


        $this->getAndSetSortParams('resultsperpage');

    }

    function getWholeSum($orderPositions) {
        $total_sum = 0;         
        foreach($orderPositions as $order_position) {
            $one_sum = $order_position->getSum();
            $total_sum = $total_sum + $one_sum; 
        }
        return $total_sum;
    }

    function offsetHelper($numberOfEntriePerPage) {
        $uri = $_SERVER["REQUEST_URI"];
        $pageMatch = '/\?page=(\d)/';
        preg_match($pageMatch, $uri, $offset);
        if (!empty($offset)) {
            return substr($offset[0], 6) - 1;
        } else {
            return 0;
        }
    }

    function getAndSetSortParams($param) {
        if( $param == "resultsperpage" && isset($_GET["resultsperpage"]))
        {
            $this->resultsPerPage = $_GET["resultsperpage"];
            return $this->resultsPerPage;
        } else {
            return $this->resultsPerPage;
        }
    }

    function numberOfPages() {
        $numPerPage = intval($this->getAndSetSortParams('resultsPerPage'));
        $totalNumOrders = count($this->orderLoader->loadModelsByLimit($this->numTotalResults));
        $result = round($totalNumOrders / $numPerPage);
        return $result;
    }


    function handle(Request $request, Response $response) {
        $numberOfPages = $this->numberOfPages();
        $numberOfResults = count($this->orderLoader->loadModelsByLimit($this->numTotalResults));
        $resultsPerPage = $this->getAndSetSortParams('resultsperpage');
        $offset = $this->offsetHelper(1);
        // $_orders = $this->orderLoader->loadModelsByLimit($resultsPerPage, $offset);


        $orders = $this->orderLoader->load(
            Data_ResultQuery::createDefault(), 
            Data_ResultOrder::createDefault(), 
            new Data_ResultLimit($resultsPerPage, $offset)
        );

        $orderPositions = $this->orderPositionsLoader->loadModelsByLimit($this->numTotalResults);
        //This needs to be put in a loop so when more are added
        //it is auto generated
        $position1 = $this->orderPositionsLoader->loadPositionsByOrderId(1);
        $position2 = $this->orderPositionsLoader->loadPositionsByOrderId(2);
        $position3 = $this->orderPositionsLoader->loadPositionsByOrderId(3);
        //
        $sums = array($this->getWholeSum($position1), $this->getWholeSum($position2), $this->getWholeSum($position3));

        $renderJob = new Templating_RenderJob('list', [
            'headline' => 'Orders',
            'orders' => $orders,
            'headline2' => 'Order Positions',
            'orderPositions' => $orderPositions,
            'sums' => $sums,
            'numberOfPages' => $numberOfPages,
            'offset' => $offset,
            'numberOfResults' => $numberOfResults
        ]);
        
        $response->setRenderJob($renderJob);
    }
}