<?php

include "admin_header.php";                 
?>


<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .info-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Medicine Information</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
include("database/connect.php");
// Get the patient ID from the URL parameter
$medsId = $_GET['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient information based on the provided ID
$sql = "SELECT * FROM medicines WHERE id = $medsId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Medicine not found.";
    exit();
}

// Close connection
$conn->close();
?>

<div class="info-container">
   
    <label>Medicine Name:</label>
    <p><?= htmlspecialchars($row['Name']) ?></p>

    <label>Ingredients:</label>
    <p><?= htmlspecialchars($row['ingredients']) ?></p>

    <label>dosage:</label>
    <p><?= htmlspecialchars($row['dosage']) ?></p>

    <label>Indications:</label>
    <p><?= htmlspecialchars($row['indications']) ?></p>

    <label>Usage</label>
    <p><?= htmlspecialchars($row['usage']) ?></p>

    <label>Side Effects</label>
    <p><?= htmlspecialchars($row['sideEffects']) ?></p>

    <label>Warnings:</label>
    <p><?= htmlspecialchars($row['warnings']) ?></p>

    <label>Cost</label>
    <p><?= htmlspecialchars($row['cost']) ?></p>

    <label>Expiry Date</label>
    <p><?= htmlspecialchars($row['expiryDate']) ?></p>

    <label>Quantity:</label>
    <p><?= htmlspecialchars($row['quantity']) ?></p>

    <label>Date of Entry:</label>
    <p><?= htmlspecialchars($row['dateOfEntry']) ?></p>

    
    <a href="admin_manage_medicine.php" style ="color:red;">Go back to the previous</a>
</div>



<?php

include "footer.php";                 
?>
