<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    die("Akses ditolak");
}

$id = $_SESSION['user_id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
?>

<h1><?= htmlspecialchars($data['name']); ?></h1>
<p><?= htmlspecialchars($data['email']); ?></p>