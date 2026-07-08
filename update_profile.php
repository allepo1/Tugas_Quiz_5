<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    die("Akses ditolak");
}

$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = trim($_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email salah");
}

$stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

if(mysqli_stmt_execute($stmt)) {
    echo "Berhasil";
} else {
    echo "Gagal update";
}
?>