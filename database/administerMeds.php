
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administer medicine</title>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
          /* transactions page */
    .form{
        padding: 30px 40px;
      }
      
      .form-control{
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
      }
      
      .form-control label{
        display: inline-block;
        margin-bottom: 5px;
        color:blue;
      }
      .form-control input{
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        
        font-size: 14px;
        padding: 10px;
        width: 100%;
      }
      
      .form-control input:focus{
        outline: 0;
        border-color: #777;
      }
      
      
      .form button{
        background-color: #8e44ad;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;
      }   
    </style>
</head>
<body>
    <div>
    <div class='head'>
    <h2 style='color:blue;text-align:center;'> Administer medicine below</h2>
    </div>
   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class='form' id = 'form' method = 'POST'>
     <div class='form-control'>
        <label for='nameOfMed' >Name of the medicine chosen</label>
         <input type='text' name='nameOfMed' id='' placeholder = "Enter the name of the medicine shown below" value='<?php echo isset($_GET["name"]) ? htmlspecialchars($_GET["name"]) : ""; ?>' required>
        <br>
        <br>
         <label for='patientId' >Patient receiving medication</label>
        <select name='patientId' id=''>
          <?php
          include("connect.php");
          $sql = "SELECT * FROM `patients`";
          $response = mysqli_query($conn, $sql);
            if($response){
              $num = mysqli_num_rows($response);
              if($num >0){
                while($row = mysqli_fetch_assoc($response)){
                  echo "
                          <option value='{$row["id"]}'>{$row["username"]}</option>
                        
                  ";
                }
              }
            }
          ?>
          </select>
          <br>
          <br>
          
         <label for="methodOfAdmin">The method of administration</label>
         <br>
              <select name="methodOfAdmin" id="">
                <option value="Oral">Oral</option>
                <option value="Sublingual and Buccal">Sublingual and Buccal</option>
                <option value="Topical">Topical(skin)</option>
                <option value="Inhalation">Inhalation</option>
                <option value="Parenteral">Parenteral(Injections)</option>
                <option value="Vaginal">Vaginal(Creams, foams, tablets)</option>
                <option value="Ophthalmic">Ophthalmic and Otic(Eye drops, ointments, and ear drops)</option>
                <option value="Nasal">Nasal</option>
              </select>
              <br>
              <br>
         
          </div>
          
         <button type ='submit' name= 'adminMedsSubmit'> Submit</button>
         <br>
         <!-- <button style = "background-color:red;">Close/ Go back</button> -->
         <a href="../nurse_medicines.php" style = "text-decoration:none;"><input type="button" value="Close/ Go back" style = "background-color:red; display: inline;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 13px;
    
    position: relative;
    cursor: pointer;"></a>
          </form>
    </div>
    
    
    <?php
       $id = $_GET["id"];
       $name = $_GET["name"];
       
       // ... (repeat for other columns)
       
       // Display the data on the page as needed
       echo "<h2>You have selected the medicine below to be administered</h2><br>";
       echo "<p>Id: $id</p><br>";
       echo "Name: $name<br>";
       
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["adminMedsSubmit"])){
          $nameOfMed = filter_input(INPUT_POST, "nameOfMed", FILTER_SANITIZE_SPECIAL_CHARS);
          $patientId = filter_input(INPUT_POST, "patientId", FILTER_SANITIZE_SPECIAL_CHARS);
          $methodOfAdmin = filter_input(INPUT_POST, "methodOfAdmin", FILTER_SANITIZE_SPECIAL_CHARS);

          $sql = "SELECT `quantity`
                  FROM `medicines`";
          $respond = mysqli_query($conn, $sql);
            if($respond){
              $num = mysqli_num_rows($respond);

              if($num>0){
                

              }else{
                echo "<h2>The medicine is used up</h2>";
              }
            }
        }
       }
       
    ?>
</body>
</html>