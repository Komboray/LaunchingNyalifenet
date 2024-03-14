<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physical Examination</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-row {
            margin-top: 10px;
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h2>Physical Examination</h2>

    <!-- Form for adding new data -->
    <form action="process_physical_examination.php" method="post" id="physicalExaminationForm">
        <table id="physicalExaminationTable">
            <tr>
                <th>Examination Area</th>
                <th>Indicated</th>
                <th>Not Indicated</th>
                <th>Description</th>
            </tr>
            <!-- Default rows -->
            <tr>
                <td>Thyroid</td>
                <td><input type="checkbox" name="thyroidIndicated"></td>
                <td><input type="checkbox" name="thyroidNotIndicated"></td>
                <td><input type="text" name="thyroidDescription"></td>
            </tr>
            <tr>
                <td>Lungs</td>
                <td><input type="checkbox" name="lungsIndicated"></td>
                <td><input type="checkbox" name="lungsNotIndicated"></td>
                <td><input type="text" name="lungsDescription"></td>
            </tr>
            <!-- Add more rows for other examination areas -->
        </table>

        <div class="add-row" onclick="addNewRow('physicalExaminationTable')">+ Add More</div>

        <button type="submit">Add Entry</button>
    </form>

    <script>
        function addNewRow(tableId) {
            var table = document.getElementById(tableId);
            var newRow = table.insertRow(table.rows.length);
            var defaultRow = table.rows[1]; // Assuming the default row is at index 1

            for (var i = 0; i < defaultRow.cells.length; i++) {
                var newCell = newRow.insertCell(i);
                var cellContent = defaultRow.cells[i].innerHTML;

                if (i === 0) {
                    // For the first cell, just copy the content
                    newCell.innerHTML = cellContent;
                } else {
                    // For other cells, clear the content and update input names
                    newCell.innerHTML = "";
                    var input;

                    if (i === 1 || i === 2) {
                        // For checkboxes
                        input = document.createElement("input");
                        input.type = "checkbox";
                        input.name = cellContent.toLowerCase().replace(/\s/g, "") + "New";
                    } else {
                        // For text inputs
                        input = document.createElement("input");
                        input.type = "text";
                        input.name = cellContent.toLowerCase().replace(/\s/g, "") + "New";
                    }

                    newCell.appendChild(input);
                }
            }
        }
    </script>

</body>
</html>