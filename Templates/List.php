<div class="container">
    <h2><?= $headline; ?></h2>

    <form class="row" method="get">        
        <div class="col-sm-3">
            <?= $ordersNumberOfResultsPerPageDropdown ?>
        </div>
        <div class="col-sm-2">
            <?= $ordersSortOrderDropdown ?>
        </div>
        <div class="col-sm-2">
            <?= $ordersSortByDropdown ?>            
        </div>
        <div class="col-sm-2">
          <label>Update Results</label>
            <input class="btn btn-success" type='submit' name='orderloaderupdate' value="update" />
        </div>
    </form>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Sum</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order) { ?>
                <tr>
                    <td><?= $order->getId(); ?></td> 
                    <td><?= $order->getCustomerName(); ?></td>
                    <td><?= $order->getDate(); ?></td>
                    <td><?= $sums[$order->getId()] ?></td>
                    <td>
                        <a href='
                        <?= "orderdetails.html?id=" . $order->getId(); ?>
                        '>
                        <i class="btn btn-info btn-xs fa fa-info-circle"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
        <span>There are <?= $ordersTotal ?> results</span>
        <ul class="pagination pull-right col-md-4">
            <?php 
                foreach($ordersPagination as $paginationItem) { 
                    echo $paginationItem;
                } 
            ?>
        </ul>
</div><!-- end orders table -->

<div class="container">
    <div class="">

        <h2><?= $headline2; ?></h2>


        <form class="row" method="get">        
            <div class="col-sm-3">
                <?= $orderPositionsNumberOfResultsPerPageDropdown ?>
            </div>
            <div class="col-sm-2">
                <?= $orderPositionsSortOrderDropdown ?>
            </div>
            <div class="col-sm-2">
                <?= $orderPositionsSortByDropdown ?>            
            </div>
            <div class="col-sm-2">
              <label>Update Results</label>
                <input class="btn btn-success" type='submit' name='orderpositionloaderupdate' value="update" />
            </div>
        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Article Name</th>
                    <th>Article Price</th>
                    <th>Article Quantity</th>
                    <th>Order Sum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orderPositions as $order_position) { ?>
                    <tr>
                        <td><?= $order_position->getId(); ?> </td> 
                        <td><?= $order_position->getOrderId(); ?> </td> 
                        <td><?= $order_position->getArticleName(); ?> </td> 
                        <td><?= $order_position->getArticlePrice(); ?> </td> 
                        <td><?= $order_position->getQuantity(); ?> </td> 
                        <td><?= $order_position->getSum(); ?> </td> 
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <span>There are <?= $orderPositionsTotal ?> results</span>
            <ul class="pagination pull-right col-md-4">
                <?php 
                    foreach($orderPositionsPagination as $paginationItem) { 
                        echo $paginationItem;
                    } 
                ?>
            </ul>

        </div>  
    </div>  
