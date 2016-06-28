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
            <td>
            	<i class="btn btn-info btn-xs fa fa-info-circle"></i>
            </td>
        </tr>
    <?php } ?>

    </tbody>
  </table>

    <?php foreach($orderPositions as $order_position) { ?>
            <?= $order_position->getId(); ?> 
            <?= $order_position->getCustomerName(); ?>
            <?= $order_position->getDate()->format('d.m.y, H:i'); ?>
            
    <?php } ?>


