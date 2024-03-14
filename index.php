<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="application/nya-logo.jpg">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('application/dist/img/background.jpg'); /* Adjust the path to your background photo */
            background-size: cover;
            background-position: center;
            color: white;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        img.logo {
            width: 200px;
            height: 100px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            width: 100%;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        a {
            color: #333;
            text-decoration: none;
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
          background: green;
          color:#A94442;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
    </style>
</head>
<body>

<div class="container">
    <img class="logo" src="application/dist/img/logo.png" alt="Logo"> 
    <?php if(isset($_GET["error"])){
    echo "<p class ='error'> {$_GET["error"]} </p>";
 
  } ?>
  <?php if(isset($_GET["success"])){
    echo "<p class ='success'> {$_GET["success"]} </p>";
 
  } ?>
    <h2>Login</h2>

   
    <form action="application/process_login.php" method="post">
        <input type="email" name="email" placeholder="Email" required>

     
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <p><a href="application/forgot_password.php">Forgot Password?</a></p>
</div>

</body>
    <?php//@codebyvakotech?>
</html>
