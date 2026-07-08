<?php

include 'db.php';

$id = $_GET['id'];

$query = "
SELECT *
FROM users
WHERE id = $id
";

$result = mysqli_query($conn,$query);

$data = mysqli_fetch_assoc($result);

?>

<h1><?= $data['name']; ?></h1>
<p><?= $data['email']; ?></p>