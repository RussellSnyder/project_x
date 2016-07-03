<?php

$myDB = new PDO('sqlite:data.sqlite3');



$query = $myDB->prepare(
    'INSERT INTO orderPositions (orderId, articleName, articlePrice, quantity) VALUES (?, ?, ?, ?)');
$sum = $price * $quantity;
$query->execute(array($id, $name, $price, $quantity));

header('Location: '. '/orderdetails.html?id=' . $id);

?>