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
  <title>Manage Inventory</title>
</head>
<body>

<div class="sidebar">
  <h2 class="logo">QueryCrew</h2>
  <a href="index.php">Home</a>
  <a href="add_medicine.php">Add Medicine</a>
  <a href="view_medicines.php" class="active">Manage Inventory</a>
  <a href="supplier_view.php">Supplier View</a>
  <a href="prescription_view.php">Prescriptions</a>

</div>

<div class="content">
  <h2>Manage Inventory</h2>

  <input type="text" id="searchBox" placeholder="Search..." onkeyup="searchMedicine()">

  <table id="medicineTable">
    <thead>
      <tr>
        <th>Name</th><th>Batch</th><th>Qty</th><th>Expiry</th><th>Update</th><th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
$result = mysqli_query($conn, "SELECT * FROM medicine");
while($row = mysqli_fetch_assoc($result)){
    $low = ($row['stock_qty'] < $row['min_qty']) ? "style='background:#ffdbdb'" : "";
    echo "<tr $low>

            <td>{$row['name']}</td>
            <td>{$row['batch_no']}</td>
            <td>{$row['stock_qty']}</td>
            <td>{$row['expiry_date']}</td>

            <td>
              <a href='update_medicine.php?id={$row['medicine_id']}'>
                <button>Update</button>
              </a>
            </td>

            <td>
              <a href='delete_medicine.php?id={$row['medicine_id']}' 
                 onclick=\"return confirm('Are you sure you want to delete this medicine?');\">
                <button style='background:red;color:white;'>Delete</button>
              </a>
            </td>
          </tr>";
}
?>


    </tbody>
  </table>
</div>

<script>
function searchMedicine(){
  let filter = document.getElementById("searchBox").value.toUpperCase();
  let rows = document.querySelectorAll("#medicineTable tbody tr");
  rows.forEach(r => r.style.display = r.cells[0].innerText.toUpperCase().includes(filter) ? "" : "none");
}

function saveChanges(){
  alert("Updated Successfully!");
}

function deleteRow(btn){
  btn.parentElement.parentElement.remove();
  alert("Deleted Successfully!");
}
</script>

</body>
</html>

