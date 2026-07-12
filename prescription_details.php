<?php
$conn = mysqli_connect("localhost", "root", "", "medical_inventory");

$id = $_GET['id'];

$query = "SELECT pr.prescription_id, pa.full_name, pr.presc_date, pr.doctor_name
          FROM prescription pr
          JOIN patient pa ON pr.patient_id = pa.patient_id
          WHERE pr.prescription_id = $id";

$header = mysqli_fetch_assoc(mysqli_query($conn, $query));

$details = mysqli_query($conn,
"SELECT m.name, pi.dosage, pi.frequency, pi.days, pi.qty_dispensed
 FROM prescription_item pi
 JOIN medicine m ON pi.medicine_id = m.medicine_id
 WHERE pi.prescription_id = $id");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Prescription Details</title>

<style>
.container-box {
  background: #1c1f26;
  padding: 20px;
  margin: auto;
  width: 90%;
  border-radius: 10px;
  box-shadow: 0 0 12px rgba(0,0,0,0.5);
}

.info-card {
  background: #292d36;
  padding: 18px;
  border-radius: 8px;
  margin-bottom: 20px;
  color: #e8e8e8;
}

.info-card p {
  margin: 6px 0;
  font-size: 15px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

th {
  background: #353946;
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
  background: #2f333d;
  transition: 0.3s;
}

.back-btn {
  display: inline-block;
  background: #3c82f6;
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  text-decoration: none;
  margin-bottom: 15px;
}
.back-btn:hover {
  background: #1d5fd6;
}
.section-title {
  color: white;
  margin-bottom: 14px;
  font-size: 22px;
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
  <div class="container-box">

  <a href="prescription_view.php" class="back-btn">← Back to Prescriptions</a>

  <h2 class="section-title">Prescription Details</h2>

  <div class="info-card">
    <p><strong>Prescription ID:</strong> <?php echo $header['prescription_id']; ?></p>
    <p><strong>Patient Name:</strong> <?php echo $header['full_name']; ?></p>
    <p><strong>Doctor:</strong> <?php echo $header['doctor_name']; ?></p>
    <p><strong>Date:</strong> <?php echo $header['presc_date']; ?></p>
  </div>

  <h3 class="section-title">Medicines Issued</h3>

  <table>
  <tr>
    <th>Medicine</th>
    <th>Dosage</th>
    <th>Frequency</th>
    <th>Days</th>
    <th>Quantity</th>
  </tr>

  <?php while($row = mysqli_fetch_assoc($details)){ ?>
  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['dosage']; ?></td>
    <td><?php echo $row['frequency']; ?></td>
    <td><?php echo $row['days']; ?></td>
    <td><?php echo $row['qty_dispensed']; ?></td>
  </tr>
  <?php } ?>

  </table>

  </div>
</div>

</body>
</html>
