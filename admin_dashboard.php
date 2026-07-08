<?php

include 'db.php';

$query = "
SELECT *
FROM orders
";

$result = mysqli_query($conn,$query);

while($order = mysqli_fetch_assoc($result))
{
$user = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM users WHERE id='".$order['user_id']."'"
)
);

$product = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM products WHERE id='".$order['product_id']."'"
)
);

echo $user['name'];

echo $product['name'];

echo $order['total'];
}