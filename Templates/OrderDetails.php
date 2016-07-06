<table class="table table-striped" id="OrderPosition_Table">
<thead>
  <tr>
    <th>ID</th>
    <th>OrderID</th>
    <th>Article Name</th>
    <th>Article Price</th>
    <th>Article Quantity</th>
    <th>Price * Quantity</th>
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
    </tr>
<?php } ?>
    <tr>
        <td colspan="4"></td>
        <td><b>Grand Total:</b></td>
        <td class="total"><?= $grandTotal ?></td>
    </tr>
</tbody>
</table>
<div class="col-sm-10 col-sm-offset-1">
<a class="btn btn-sm btn-primary show_button" ><i class="fa fa-plus"></i>  
  to this OrderID
</a>
<a class="btn btn-sm btn-warning close_button" ><i class="fa fa-minus"></i>
 Hide Form
</a>
<br><br>
<form class="form-horizontal show_container" action="AddOrderPosition.html" id="AddOrderPosition_ForThisID_Form" method="post">
  <input type="hidden" name="id" value="<?= $order_position->getOrderId(); ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="price">Price:</label>
    <div class="col-sm-10">
        <input type="number" min="0.01" step="0.01" class="form-control" name="price" id="price" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="quantity">Quantity:</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
  </div>
  <button type="submit" id="Add_To_OrderPostions_Table_Button" class="col-sm-10 col-sm-offset-2 btn btn-default btn-success"><i class="fa fa-paper-plane"></i> Add Article</button>
</form>
</div>