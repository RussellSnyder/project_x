<div>
    
<h2><?= $headline1; ?></h2>

<table class="table table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Date</th>
    <th>Number of Unique Order IDs</th>
    <th>Total Purchase</th>
    <th>Details</th>
  </tr>
</thead>
<tbody>
<?php foreach($orders as $order) { ?>
    <tr>
        <td><?= $order->getId(); ?></td> 
        <td><?= $order->getCustomerName(); ?></td>
        <td><?= $order->getDate()->format('d.m.y, H:i'); ?></td>
        <td>coming soon</td>
        <td>coming soon</td>
        <td>
            <i class="btn btn-info btn-xs fa fa-info-circle"></i>
        </td>
    </tr>
<?php } ?>

</tbody>
</table>
</div>

<div>
    
<h2><?= $headline2; ?></h2>

<table class="table table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>OrderID</th>
    <th>Article Name</th>
    <th>Article Price</th>
    <th>Article Quantity</th>
    <th>Price * Quantity</th>
    <th>sum of OrderID</th>
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
        <td><? $order_sum = $order_position->getSum();
            echo money_format('%.2n',$order_sum) ?> </td> 
        <td>Coming soon... </td> 
    </tr>
<?php } ?>

</tbody>
</table>

            
</div>

<h1>Real tests</h1>

<? print_r($test) ?>

<h1>
<?= $testSum ?>
</h1>


<form action="AddOrderPosition.html" method="post">
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price">
    </p>
    <p>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity">
    </p>
    <input type="submit" value="Add Records">
</form>