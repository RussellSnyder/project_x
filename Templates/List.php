<div class="container">
    <h2><?= $headline; ?></h2>

    <form class="row" method="get">        
        <div class="col-sm-3">
          <label for="numPerPage">Number of Results Per Page</label>
          <select class="form-control" 
            id="numPerPage" name='resultsperpage' 
            value='<?= $_GET['resultsperpage'] ?>'
            >
            <?php 
            for ($i = 1; $i <= 7; $i++) {
                if ($i == $_GET['resultsperpage']) {
                    $selected = 'selected';
                } else {
                    $selected = 'none';
                }

                echo '<option ' . $selected . '="' . $selected . '">' . $i . '</option>';
            }

            ?>
          </select>
        </div>
        <div class="col-sm-2">
          <label for="order">Display Results</label>
          <select class="form-control" 
            id="order" name='order' 
            value='<?= $_GET['order'] ?>'
            >
            <?php 
            $orderArray = ['ASC', 'DESC'];
            foreach ($orderArray as $item) {
                if ($item == strtoupper($_GET['order'])) {
                    $selected = 'selected';
                } else {
                    $selected = 'none';
                }

                echo '<option ' . $selected . '="' . $selected . '">' . $item . '</option>';
            }

            ?>
          </select>

        </div>
        <div class="col-sm-2">
          <label for="order">Order Results By</label>
          <select class="form-control" 
            id="orderby" name='orderby' 
            value='<?= $_GET['orderby'] ?>'
            >
            <?php 
            $orderArray = ['ID', 'Name', 'Date', 'Sum'];
            foreach ($orderArray as $item) {
                if ($item == ucfirst($_GET['orderby'])) {
                    $selected = 'selected';
                } else {
                    $selected = 'none';
                }

                echo '<option ' . $selected . '="' . $selected . '">' . $item . '</option>';
            }

            ?>
          </select>

        </div>
        <div class="col-sm-2">
          <label>Update Results</label>
            <input class="btn btn-success" type='submit' name='submit' value="Update" />
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
                    <td><?= $order->getDate()->format('d.m.y, H:i'); ?></td>
                    <td><?= $sums[$order->getId() - 1] ?></td>
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
        <span>There are <?= $numberOfResults ?> results</span>
        <ul class="pagination pull-right col-md-4">
            <?php 
                include('pagination_functions.php'); 
                for ($i = 1; $i <= $numberOfPages; $i++) {
                    $class = activePaginationCheck($i);
                    $link = linkToPaginationRoute($i);
                    echo '<li class="' . $class . '"><a href="' . $link . '">' . $i . '</a></li>';
                }
            ?>
        </ul>
</div><!-- end orders table -->

<div class="container">
    <a class="btn btn-sm btn-primary show_button" >
        Show All Order Positions
        <i class="fa fa-arrow-circle-down"></i>
    </a>
    <a class="btn btn-sm btn-warning close_button" ><i class="fa fa-minus"></i>
        Hide Order Positions
    </a>

    <div class="show_container">

        <h2><?= $headline2; ?></h2>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td><?= $order_position->getArticleName(); ?> </td> 
                        <td><?= $order_position->getArticlePrice(); ?> </td> 
                        <td><?= $order_position->getQuantity(); ?> </td> 
                        <td><? $order_sum = $order_position->getQuantity() * $order_position->getArticlePrice(); echo money_format('%.2n',$order_sum) ?> </td> 
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>  
    </div>  
