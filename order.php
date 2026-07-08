<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    die("Harus login untuk order");
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$qty = (int) $_POST['qty'];

if($qty <= 0) {
    die("Jumlah tidak valid");
}

$stmt_prod = mysqli_prepare($conn, "SELECT * FROM products WHERE id=?");
mysqli_stmt_bind_param($stmt_prod, "i", $product_id);
mysqli_stmt_execute($stmt_prod);
$result_prod = mysqli_stmt_get_result($stmt_prod);
$product = mysqli_fetch_assoc($result_prod);

if(!$product) {
    die("Produk tidak ada");
}

$total = $product['price'] * $qty;

$stmt_order = mysqli_prepare($conn, "INSERT INTO orders (user_id, product_id, qty, total) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt_order, "iiid", $user_id, $product_id, $qty, $total);

if(mysqli_stmt_execute($stmt_order)) {
    echo "Order berhasil";
} else {
    echo "Order gagal";
}
?>