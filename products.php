<?php
include 'db.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)) {
?>

<div>
<h3><?= htmlspecialchars($row['name']); ?></h3>
<p>Rp <?= number_format($row['price']); ?></p>
</div>

<?php
}
?>