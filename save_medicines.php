<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$batch = $_POST["batch_no"];
$supplier = $_POST["supplier_id"];
$price = $_POST["unit_price"];
$stock = $_POST["stock_qty"];
$expiry = $_POST["expiry_date"];
$min = $_POST["min_qty"];

$sql = "INSERT INTO medicine(name, batch_no, supplier_id, unit_price, stock_qty, expiry_date, min_qty)
VALUES('$name', '$batch', $supplier, $price, $stock, '$expiry', $min)";

mysqli_query($conn, $sql);

header("Location: view_medicines.php");
exit();
?>
