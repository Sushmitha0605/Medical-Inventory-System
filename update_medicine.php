<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM medicine WHERE medicine_id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
  $new_stock = $_POST['stock_qty'];
  mysqli_query($conn, "UPDATE medicine SET stock_qty=$new_stock WHERE medicine_id=$id");
  header("Location: view_medicines.php");
  exit();
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
</div>

<div class="content">
<h2>Update Medicine Stock</h2>

<form method="POST">
<label>Medicine Name</label>
<input type="text" value="<?php echo $row['name']; ?>" disabled>

<label>Current Stock</label>
<input type="number" name="stock_qty" value="<?php echo $row['stock_qty']; ?>" required>

<button type="submit" name="update">Update</button>
</form>

</div>

</body>
</html>
