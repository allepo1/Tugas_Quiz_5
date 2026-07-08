<?php
session_start();
include 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    session_regenerate_id(true);
    $_SESSION['login'] = true;
    $_SESSION['user_id'] = $user['id'];
    echo "Login Berhasil";
} else {
    echo "Login Gagal";
}
?>