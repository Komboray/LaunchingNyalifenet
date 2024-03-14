<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current History</title>
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

    <h2>Current History</h2>

    <!-- Form for adding new data -->
    <form action="process_current_history.php" method="post" id="currentHistoryForm">
        <table id="currentHistoryTable">
            <tr>
                <th>Question</th>
                <th>No</th>
                <th>Yes</th>
                <th>Details</th>
            </tr>
            <!-- Default rows -->
            <tr>
                <td>Smoke</td>
                <td><input type="radio" name="smoke" value="no"></td>
                <td><input type="radio" name="smoke" value="yes"></td>
                <td><input type="text" name="smokeDetails"></td>
            </tr>
            <tr>
                <td>Use alcohol</td>
                <td><input type="radio" name="alcohol" value="no"></td>
                <td><input type="radio" name="alcohol" value="yes"></td>
                <td>
                    Wine (glasses/day): <input type="text" name="wine"><br>
                    Beer (bottles/day): <input type="text" name="beer"><br>
                    Hard liquid (oz./day): <input type="text" name="hardLiquid">
                </td>
            </tr>
            <tr>
                <td>Use illicit drugs</td>
                <td><input type="radio" name="illicitDrugs" value="no"></td>
                <td><input type="radio" name="illicitDrugs" value="yes"></td>
                <td>
                    Type: <input type="text" name="illicitDrugsType"><br>
                    Amount: <input type="text" name="illicitDrugsAmount">
                </td>
            </tr>
            <tr>
                <td>Exercise</td>
                <td colspan="3">
                    Type: <input type="text" name="exerciseType"><br>
                    How often: <input type="text" name="exerciseFrequency">
                </td>
            </tr>
            <tr>
                <td>Drug Allergies</td>
                <td><input type="radio" name="drugAllergies" value="no"></td>
                <td><input type="radio" name="drugAllergies" value="yes"></td>
                <td>
                    List: <input type="text" name="drugAllergiesList">
                </td>
            </tr>
        </table>

        <div class="add-row" onclick="addNewRow('currentHistoryTable')">+ Add More</div>

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
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = cellContent.toLowerCase().replace(/\s/g, "") + "New";
                    newCell.appendChild(input);
                }
            }
        }
    </script>

</body>
</html>