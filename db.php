<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerce";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = mysqli_connect($host, $user, $pass, $db);
} catch (Exception $e) {
    die("Koneksi database gagal.");
}
?>