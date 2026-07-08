<?php

include 'db.php';

$user_id = $_POST['user_id'];

$product_id = $_POST['product_id'];

$qty = $_POST['qty'];

$product = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM products WHERE id='$product_id'"
)
);

$total = $product['price'] * $qty;

mysqli_query(
$conn,
"
INSERT INTO orders
(
user_id,
product_id,
qty,
total
)
VALUES
(
'$user_id',
'$product_id',
'$qty',
'$total'
)
"
);

echo "Order berhasil";