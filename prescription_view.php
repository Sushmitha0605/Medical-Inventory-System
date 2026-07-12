<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Prescription Records</title>

<style>
.table-container {
  background: #1c1f26;
  padding: 20px;
  border-radius: 10px;
  width: 92%;
  margin: auto;
  box-shadow: 0 0 12px rgba(0,0,0,0.5);
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
}

th {
  background: #292d36;
  color: #fff;
  padding: 12px;
  text-align: left;
  border-bottom: 2px solid #3a3f4b;
  font-size: 15px;
}

td {
  padding: 11px;
  border-bottom: 1px solid #333;
  color: #e8e8e8;
  font-size: 14px;
}

tr:hover {
  background: #2f333d;
  transition: 0.3s;
}

.section-title {
  font-size: 24px;
  color: white;
  margin-bottom: 15px;
}
button {
  padding: 5px 10px;
  border-radius: 6px;
  border: none;
  cursor: pointer;
  background: #3c82f6;
  color: white;
}
button:hover {
  background: #1d5fd6;
}
</style>

</head>
<body>

<div class="sidebar">
  <h2 class="logo">QueryCrew</h2>
  <a href="index.php">Home</a>
  <a href="add_medicine.php">Add Medicine</a>
  <a href="view_medicines.php">Manage Inventory</a>
  <a href="supplier_view.php">Supplier Overview</a>
  <a href="prescription_view.php" class="active">Prescriptions</a>
</div>

<div class="content">
<h2 class="section-title">Prescription Records</h2>

<div class="table-container">

<table>
<tr>
  <th>Prescription ID</th>
  <th>Patient Name</th>
  <th>Date</th>
  <th>Doctor</th>
  <th>Details</th>
</tr>

<?php
$query = "SELECT p.prescription_id, pat.full_name, p.presc_date, p.doctor_name
          FROM prescription p
          JOIN patient pat ON p.patient_id = pat.patient_id
          ORDER BY p.presc_date ASC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
  echo "<tr>
          <td>{$row['prescription_id']}</td>
          <td>{$row['full_name']}</td>
          <td>{$row['presc_date']}</td>
          <td>{$row['doctor_name']}</td>
          <td><a href='prescription_details.php?id={$row['prescription_id']}'><button>View</button></a></td>
        </tr>";
}
?>
</table>

</div>
</div>
</body>
</html>
