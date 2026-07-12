<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
<h2 class="logo">QueryCrew</h2>
<a href="index.php">Home</a>
<a href="add_medicine.php">Add Medicine</a>
<a href="view_medicines.php">Manage Inventory</a>
<a href="supplier_view.php">Supplier View</a>
<a href="prescription_view.php">Prescriptions</a>
</div>


<div class="content">
<h2>Add Medicine</h2>


<form action="save_medicines.php" method="POST">
  <label>Medicine Name</label>
  <input type="text" name="name" required>

  <label>Batch Number</label>
  <input type="text" name="batch_no" required>

  <label>Supplier ID</label>
  <input type="number" name="supplier_id" required>

  <label>Unit Price</label>
  <input type="number" step="0.01" name="unit_price" required>

  <label>Stock Quantity</label>
  <input type="number" name="stock_qty" required>

  <label>Expiry Date</label>
  <input type="date" name="expiry_date" required>

  <label>Minimum Quantity</label>
  <input type="number" name="min_qty" required>

  <button type="submit">Save</button>
</form>



</div>
</body>
</html>