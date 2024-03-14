<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Visitor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .delete-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            margin-bottom: 20px;
            color: red;
        }

        p {
            margin-bottom: 20px;
        }

        .confirmation-buttons {
            display: flex;
            justify-content: space-between;
        }

        .confirmation-buttons button {
            padding: 10px;
            cursor: pointer;
        }

        .cancel-button {
            background-color: #ccc;
        }

        .delete-button {
            background-color: red;
            color: white;
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

// Handle the delete operation if confirmed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    $sql_delete = "DELETE FROM visitors WHERE id = $id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Visitor information deleted successfully!";
        exit();
    } else {
        echo "Error deleting visitor information: " . $conn->error;
    }
}
?>

<div class="delete-container">
    <h2>Delete Visitor</h2>
    <p>Are you sure you want to delete the following visitor record?</p>
    <p><strong>Purpose:</strong> <?= htmlspecialchars($row['purpose']) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
    <p><strong>Visit Date:</strong> <?= htmlspecialchars($row['visit_date']) ?></p>

    <form action="delete_visitor.php?id=<?= $id ?>" method="post" class="confirmation-buttons">
        <button type="submit" name="confirm_delete" class="delete-button">Delete</button>
        <button type="button" onclick="cancelDelete()" class="cancel-button">Cancel</button>
    </form>
</div>

<script>
    function cancelDelete() {
        window.location.href = 'manage_visitors.php';
    }
</script>

</body>
</html>
