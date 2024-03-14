<?php
include("connect.php");
//the below values have been tried tested and approved!
$id = $_GET["id"];
$track = $_GET["track"];

$name = $_GET["name"];

$email = $_GET["email"];

$phoneN = $_GET["phone"];
$total = $_GET["total"];
// echo $sessionPatient_N;
// $id = $_SESSION["id"];
//this is the medical history of the patient, both current and past including the notes of the doctor that have been taken
 //below is the php code that updates the rooms in the patient part

 if($_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset($_POST["back"])){
        $sql = "UPDATE `patients`
                SET `rooms` = 'Billing'
                WHERE `PatientID` = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location:../doctor_index.php?success=The patient has been sent to the billing session");

        }
 
     }else{
             header("Location:../doctor_index.php?error=an error occurred");

         }
     }
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRINT PATIENT INVOICE</title>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        @media print {
      img {
        display: block;
        max-width: 100%;
        height: auto;
      }
    }
        /* .a{
            margin-right: 5px;
        } */
        .container {
            display: flex; /* Use flexbox layout */
    justify-content: space-between;
            max-width: 800px;
            height:100px;
            margin: 60px auto;
            padding: 20px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */

        }
        input,select{  
            width: 100%;
                background-color: #141824;
                border: none;
                outline: none;
                padding: 10px;
                font-family: 'Poppins';
                margin-top: 5px;
                resize: none;
                color: #fff;
                border-radius: 10px;}

                
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.view-container {
    /* height: 1200px; */
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.staff-info {
    margin-top: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

span {
    display: inline-block;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.back-button {
    display: block;
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 10px;
}
.back-button1{
    display: block;
    background-color:#FF00FF;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 10px;
}

.back-button:hover {
    background-color: #2980b9;
}

        
    </style>
    <!-- jsPDF CDN Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jsPDF CDN Link -->
    <script>
    function printMyBillingArea(){
        var divContents = document.getElementById("myBillingArea").innerHTML;
        var a = window.open('', '');
        a.document.write('<html><title>Nyalifewomens clinic</title>');
        a.document.write('<body style="font-family:fangsong;"></title>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }

    window.jsPDF = window.jspdf.jsPDF;
    var docPDF = new jsPDF;
    function downloadPDF(invoiceNo){
        var elementHTML = document.querySelector("#myBillingArea");
        docPDF.html(elementHTML, {
            callback: function(){
                docPDF.save(invoiceNo+'pdf');
            },
            x:15,
            y:15,
            width:170,
            windowWidth:650
        });
        


    }
</script>
    
    
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
</head>
<body>  
<div class="container">
        <h1>Print Invoice</h1>
        <button class="back-button" style="text-decoration:none;" onclick="printMyBillingArea()">Print</button>
  <button class="back-button" style="text-decoration:none;" onclick="downloadPDF('<?= $track; ?>')">Download PDF</button>
  <!-- //we are planning on ending the session below -->
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
        <button class="back-button1" type="submit" name = "back" class="back-button">Complete Session</button>
        <!-- <button type="submit" name = "confirm" class="back-button">Confirm and print invoice</button> -->
    </form>
  
  <a href="doc_finalTotalServices.php" class="back-button ">Back</a>

    </div>
<div class="view-container" id="myBillingArea">
    <img src="../nya-logo.jpg" alt="" height = "100" width = "100" align="center">
    
    <table border="0" align="center" cellspacing="20" cellpadding="10">
        <thead>
            <tr><th></th><th>Nyalife Women's Clinic</th><th></th></tr>
            <tr><th></th><th>JemPark Complex building suite A5 in Sabaki</th><th></th></tr>
            <tr><th></th><th>info@nyalifewomensclinic.com</th><th></th></tr>
            <tr><th>Details</th><th></th><th>Invoice Details</th></tr>
        </thead>
        <tbody>
            
            <tr><td>Name: <?= $name; ?><br></td><td></td><td>Invoice No:<?= $track; ?></td></tr>
            <tr><td>Phone:<?= $phoneN; ?> <br></td><td></td><td>Invoice Date: <br><?= date('Y-m-d'); ?></td></tr>
            <tr><td>Email: <?= $email; ?><br></td><td></td><td>Address: <br><p>JemPark Complex building suite A5 in Sabaki</p></td></tr>
        </tbody>
    </table>

    <table style="width:100%" cellpadding="5">
    <thead>
        <tr>
            <th align="start" style="border-bottom: 1px solid #ccc" width="5%">ID</th>
            <th align="start" style="border-bottom: 1px solid #ccc" width="5%">Service(s)</th>
            
            <th align="start" style="border-bottom: 1px solid #ccc" width="10%">Medicine</th>
            <th align="start" style="border-bottom: 1px solid #ccc" width="10%"> Total Price</th>
            <!-- <th align="start" style="border-bottom: 1px solid #ccc" width="15%">quantity</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $currentDate = date('Y-m-d');
        //we are selecting the details from the invoice table
        $sql = "SELECT * FROM `invoice`
                WHERE `invoice_no` = '$track' AND `date` = '$currentDate'";

        $res = mysqli_query($conn, $sql);
        if($res){
            $num = mysqli_num_rows($res);
            if($num>0){
                $row = mysqli_fetch_assoc($res);
                echo "<tr>
                <td style='border-bottom:1px solid #ccc;'>{$row["id"]}</td>
                <td style='border-bottom:1px solid #ccc;'>{$row["services"]}</td>
                <td style='border-bottom:1px solid #ccc;'>{$row["medicines"]}</td>
                <td style='border-bottom:1px solid #ccc;'>{$row["totals"]}</td>
                
            </tr>";
            }
        }
        ?>
        
        

    </tbody>

    </table>

</div>
<!-- <a href=".php" class="back-button" style="text-decoration:none;">Back</a> -->
  
 
  <br><br>

<script src="js/main.js"></script>

</body>
</html>




