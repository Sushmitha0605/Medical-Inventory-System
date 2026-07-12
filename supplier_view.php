<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Supplier & Medicine Overview</title>

<style>
/* Table Styling */
.table-container {
  background: #1c1f26;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  margin: auto;
  box-shadow: 0 0 12px rgba(0,0,0,0.4);
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  font-size: 15px;
}

th {
  background: #292d36;
  color: #fff;
  padding: 12px;
  text-align: left;
  border-bottom: 2px solid #3a3f4b;
}

td {
  padding: 11px;
  color: #e8e8e8;
  border-bottom: 1px solid #333;
}

tr:hover {
  background: #2a2f38;
  transition: 0.3s;
}

/* Section Title */
.section-title {
  margin-bottom: 12px;
  font-size: 22px;
  color: #fff;
}
</style>

</head>
<body>

<div class="sidebar">
  <h2 class="logo">QueryCrew</h2>
  <a href="index.php">Home</a>
  <a href="add_medicine.php">Add Medicine</a>
  <a href="view_medicines.php">Manage Inventory</a>
  <a href="supplier_view.php" class="active">Supplier Overview</a>
  <a href="prescription_view.php">Prescriptions</a>
</div>

<div class="content">
  <h2 class="section-title">Supplier & Medicine Overview</h2>

<div class="table-container">
<table>
<tr>
  <th>Supplier Name</th>
  <th>Contact</th>
  <th>Email</th>
  <th>Medicine Provided</th>
  <th>Batch Number</th>
</tr>

<?php
$query = "SELECT s.name AS supplier_name, s.contact_no, s.email, m.name AS med_name, m.batch_no
          FROM supplier s
          JOIN medicine m ON s.supplier_id = m.supplier_id
          ORDER BY s.name ASC, m.name ASC";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
  echo "<tr>
          <td>{$row['supplier_name']}</td>
          <td>{$row['contact_no']}</td>
          <td>{$row['email']}</td>
          <td>{$row['med_name']}</td>
          <td>{$row['batch_no']}</td>
        </tr>";
}
?>
</table>
</div>

</div>
</body>
</html>
