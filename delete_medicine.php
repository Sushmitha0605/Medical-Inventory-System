<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM medicine WHERE medicine_id=$id");

header("Location: view_medicines.php");
exit();
?>
