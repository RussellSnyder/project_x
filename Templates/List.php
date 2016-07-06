<h2><?= $headline; ?></h2>

<table class="table table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
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
