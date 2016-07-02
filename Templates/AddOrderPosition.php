<?php

$myDB = new PDO('sqlite:data.sqlite3');



$query = $myDB->prepare(
    'INSERT INTO orderPositions (orderId, articleName, articlePrice, quantity, sum) VALUES (?, ?, ?, ?, ?)');
$sum = $price * $quantity;
$query->execute(array($id, $name, $price, $quantity, $sum));

header('Location: '. '/orderdetails.html?id=' . $id);

?>


<i class="fa fa-thumbs-o-up"></i>

<p>Inserted <?= $id . " " . $name . " " . $price . " " . $quantity ?> into OrderPositions table </p>

