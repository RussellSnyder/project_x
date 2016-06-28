
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
            <td><?= $order->getCustomerName(); ?></td>
        </tr>
    <?php } ?>

    </tbody>
  </table>

