<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width initial-scale = 1">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">
    <link rel = "stylesheet" href = "/css/bootstrap.min.css">
    <link rel= "stylesheet" href="style.css">
    <script = src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "js/bootstrap.min.js"></script>
    <style type = "text/css">
      ul{
        padding: 10px;
      }
    </style>
    <title> DeliveryIt </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $con = new mysqli($servername, $username, $password);

    try{
    	$con->select_db("DeliveryIt");
    }
    catch(Exception $e){
    	$CreateDatabase = "CREATE DATABASE DeliveryIt";
      	$con->query($CreateDatabase);
      	$con->select_db("DeliveryIt");
    }

    $username=$_POST['username'];
    $password=$_POST['password'];

    //using try to check the table is create or no,if no then will create the relate table
    try{
    	$GetOwnerQuery = "SELECT * from Owner";
    	$con->query($GetOwnerQuery);
    }
    catch(Exception $e){
    	$CreateOwnerTableQuery = "CREATE TABLE Owner(username VARCHAR(255) PRIMARY KEY,password VARCHAR(255) NOT NULL,Fullname VARCHAR(255) NOT NULL,email VARCHAR(255) NOT NULL,phone integer(12) NOT NULL)";
      	$con->query($CreateOwnerTableQuery);
    }
    $CheckOwnerQuery = "SELECT * from Owner where username='$username'";
    $result = $con->query($CheckOwnerQuery);
        if($result->num_rows > 0){
          echo "<script>
          alert('The user name is duplicate , please select another user name');
          window.location.href='../OwnerSignUp.html';
          </script>";
        }
        else{
           $sql = "INSERT INTO Owner (Username, Password)
            VALUES ('$username', '$password')";
            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    ?>
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "MainPage.html"> DeliveryIt </a>
            </div>
          </div>
        </nav>
    </header>
    <div class = "container">
      <form action="MainPage.html" method = "post"><br>
        <input type="submit" name="Submit" value="Thank You">
      </form>
    </div>

    <div class="container">
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
