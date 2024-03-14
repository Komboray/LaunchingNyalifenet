<?php

include "reception_header.php";                 
?>


<head>
   
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
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
        }

        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// Replace these values with your actual database connection details
include("database/connect.php");
// Create connection


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $purpose = $_POST['purpose'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $visit_to = $_POST['visit_to'];
    $number_of_person = $_POST['number_of_person'];
    $visit_date = $_POST['visit_date'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];
    $note = $_POST['note'];

    // Insert data into visitors table
    $sql = "INSERT INTO visitors (purpose, name, phone, visit_to, number_of_person, visit_date, time_in, time_out, note)
            VALUES ('$purpose', '$name', '$phone', '$visit_to', '$number_of_person', '$visit_date', '$time_in', '$time_out', '$note')";

    if ($conn->query($sql) === TRUE) {
        echo "Visitor information added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<div class="form-container">
    <h2>Add New Visitor</h2>
    <form action="add_visitor.php" method="post">
        <label for="purpose">Purpose:</label>
        <input type="text" name="purpose" required>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

     
        <label for="visit_to">Visit To:</label>
        <select name="visit_to" required>
            <option value="Male">Staff</option>
            <option value="OPD Patient">OPD Patient</option>
            <option value="IPD Patient">IPD Patient</option>
        </select>

        <label for="number_of_person">Number of Persons:</label>
        <input type="number" name="number_of_person" required>

        <label for="visit_date">Visit Date:</label>
        <input type="date" name="visit_date" required>

        <label for="time_in">Time In:</label>
        <input type="time" name="time_in" required>

        <label for="time_out">Time Out:</label>
        <input type="time" name="time_out" >

        <label for="note">Note:</label>
        <textarea name="note"></textarea>

        <input type="submit" value="Add Visitor">
    </form>
</div>

</body>



<?php

include "footer.php";                 
?>
