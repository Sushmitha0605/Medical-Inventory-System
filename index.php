<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

// Get total medicines
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM medicine"))['c'];

// Get low stock count
$low = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM medicine WHERE stock_qty < min_qty"))['c'];

// Get total prescriptions
$presc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM prescription"))['c'];
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Dashboard - Medical Inventory</title>

<style>
.dashboard {
  display: flex;
  gap: 25px;
  flex-wrap: wrap;
}

.card {
  background: #1c1f26;
  width: 240px;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 12px rgba(0,0,0,0.5);
  transition: 0.3s;
}

.card:hover {
  transform: scale(1.04);
  box-shadow: 0 0 18px rgba(0,0,0,0.7);
}

.card h3 {
  color: #4aa3ff;
  margin-bottom: 10px;
  font-size: 19px;
}

.card .value {
  color: white;
  font-size: 35px;
  font-weight: bold;
}

.section-title {
  font-size: 26px;
  color: white;
  margin-bottom: 20px;
}
</style>
</head>

<body>

<div class="sidebar">
  <h2 class="logo">QueryCrew</h2>
  <a href="index.php" class="active">Home</a>
  <a href="add_medicine.php">Add Medicine</a>
  <a href="view_medicines.php">Manage Inventory</a>
  <a href="supplier_view.php">Supplier Overview</a>
  <a href="prescription_view.php">Prescriptions</a>
</div>

<div class="content">
  <h2 class="section-title">Dashboard</h2>

  <div class="dashboard">
    
    <div class="card">
      <h3>Total Medicines</h3>
      <div class="value"><?php echo $total; ?></div>
    </div>

    <div class="card">
      <h3>Low Stock Items</h3>
      <div class="value" style="color: #ff6b6b;"><?php echo $low; ?></div>
    </div>

    <div class="card">
      <h3>Total Prescriptions</h3>
      <div class="value"><?php echo $presc; ?></div>
    </div>

  </div>

</div>

</body>
</html>
