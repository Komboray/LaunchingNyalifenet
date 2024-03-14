<?php

include "admin_header.php";                 
?>

<head>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: #FFF;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        .error{
          background: #F2DEDE;
          color:#A94442;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
        .success{
          background: #fff;
          color:#FF00FF;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
        .container {
            max-width: 1200px;
            height:500px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
    </style>
</head>
<?php if(isset($_GET["error"])){
    echo "<p class ='error'> {$_GET["error"]}; </p>";
 
  } ?>
  <?php if(isset($_GET["success"])){
    echo "<p class ='success'> {$_GET["success"]}; </p>";
 
  } ?>

    <h2>Add Inventory Item</h2>

    <form action="process_add_inventory.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
       <label for="category">Category:</label>
        <select name="category" required>
            <option name="category" value="Medical Equipment">Medical Equipment</option>
            <option name="category" value="Surgical Instruments">Surgical Instruments</option>
            <option name="category" value="Pharmaceuticals">Pharmaceuticals</option>
              <option name="category" value="Personal Protective Equipment (PPE):">Personal Protective Equipment (PPE):</option>
            <option name="category" value="Diagnostic Supplies">Diagnostic Supplies</option>
            <option name="category" value="Hospital Furniture">Hospital Furniture</option>
              <option name="category" value="Cleaning and Sanitization Supplies">Cleaning and Sanitization Supplies</option>
            <option name="category" value="Surgical Instruments">Surgical Instruments</option>
            <option name="category" value="Rehabilitation Equipment">Rehabilitation Equipment</option>
            <option name="category" value="Dietary Supplies">Dietary Supplies</option>
        </select>

        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier">

        <label for="store">Store:</label>
        <input type="text" id="store" name="store">

        

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="quantity">Quantity in stock:</label>
        <input type="number" id="quantity" name="quantity" required>
        
        <label for="reorderQuantity">Reorder Quantity:</label>
        <input type="number" id="reorder_quantity" name="reorderQuantity" required>
        
        

        <label for="price"> Unit Price:</label>
        <input place holder="Ksh" type="text" id="price" name="price"  required>
        
        <label for="re_order_time"> Re-order time</label>
        <input place holder="days" type="number" id="price" name="reOrderTime"  required>
        
        <label for="discontinued">Discontinued:</label>
        <select name="discontinued" required>
            <option name="discontinued" value="Yes">Yes</option>
            <option name="discontinued" value="No">No</option>
            </select>
            
        
        <button name ="inventory" type="submit">Add Item</button>
    </form>


 
<?php

include "footer.php";                 
?>
