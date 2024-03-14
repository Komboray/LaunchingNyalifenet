<?php

include "reception_header.php";                 
?>


<head>
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .view-container {
            max-width: 400px;
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
            font-weight: bold;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife(3)";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch visitor information based on ID
    $sql = "SELECT * FROM visitors WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No visitor found with the provided ID.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}

// Close connection
$conn->close();
?>

<div class="view-container">
    <h2>Visitor Information</h2>
    <label for="purpose">Purpose:</label>
    <p><?= htmlspecialchars($row['purpose']) ?></p>

    <label for="name">Name:</label>
    <p><?= htmlspecialchars($row['name']) ?></p>

    <label for="phone">Phone:</label>
    <p><?= htmlspecialchars($row['phone']) ?></p>

    <label for="visit_to">Visit To:</label>
    <p><?= htmlspecialchars($row['visit_to']) ?></p>

    <label for="number_of_person">Number of Persons:</label>
    <p><?= htmlspecialchars($row['number_of_person']) ?></p>

    <label for="visit_date">Visit Date:</label>
    <p><?= htmlspecialchars($row['visit_date']) ?></p>

    <label for="time_in">Time In:</label>
    <p><?= htmlspecialchars($row['time_in']) ?></p>

    <label for="time_out">Time Out:</label>
    <p><?= htmlspecialchars($row['time_out']) ?></p>

    <label for="note">Note:</label>
    <p><?= htmlspecialchars($row['note']) ?></p>
</div>

</body>

<?php

include "footer.php";                 
?>
