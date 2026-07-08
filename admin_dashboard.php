<?php
session_start();
if(!isset($_SESSION['login'])) {
    die("Akses Ditolak");
}

include 'db.php';

$query = "
    SELECT orders.total, users.name AS user_name, products.name AS prod_name 
    FROM orders
    JOIN users ON orders.user_id = users.id
    JOIN products ON orders.product_id = products.id
";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    echo htmlspecialchars($row['user_name']) . " | ";
    echo htmlspecialchars($row['prod_name']) . " | Rp ";
    echo number_format($row['total']) . "<br>";
}
?>