<h2><?= $headline; ?></h2>

 <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($orders as $order) { ?>
        <tr>
            <td><?= $order->getId(); ?></td> 
            <td><?= $order->getCustomerName(); ?></td>
            <td><?= $order->getDate()->format('d.m.y, H:i'); ?></td>
            <td><a <?= "href='OrderDetails.html?".$order->getID()."'" ?>
            	<i class="btn btn-info btn-xs fa fa-info-circle"></i>
            </td>
        </tr>
    <?php } ?>

    </tbody>
  </table>

<footer class="footer">
<p>Total Orders: <b><?php echo $sum_of_orders ?></b></p>
</footer>