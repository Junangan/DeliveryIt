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

    //using try to select the database, if the dbms is no exist then create the database and select again
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
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];

    //using try to check the table is create or no,if no then will create the relate table
    try{
        $GetVolunteerQuery = "SELECT * from User";
        $con->query($GetVolunteerQuery);
    }
    catch(Exception $e){
      $CreateOwnerTableQuery = "CREATE TABLE User(username VARCHAR(255) PRIMARY KEY,password VARCHAR(255) NOT NULL,Fullname VARCHAR(255) NOT NULL,email VARCHAR(255) NOT NULL,phone integer(12) NOT NULL)";
      $con->query($CreateOwnerTableQuery);
    }
    $CheckUserQuery = "SELECT * from User where username='$username'";
      $result = $con->query($CheckUserQuery);
      if($result->num_rows > 0){
        echo "<script>
          alert('The user name is duplicate , please select another user name');
          window.location.href='../UserSignUp.html';
          </script>";
      }
      else{
        $sql = "INSERT INTO User VALUES ('$username', '$password', '$fullname', '$email', '$phonenumber')";
              mysqli_query($con, $sql);
              mysqli_close($con);
      }
    ?>
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "../MainPage.html"> DeliveryIt </a>
            </div>
          </div>
        </nav>
    </header>
    <div class = "container">
      <form action="../MainPage.html" method = "post"><br>
        <input type="submit" name="Submit" value="Thank You">
      </form>
    </div>

    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
