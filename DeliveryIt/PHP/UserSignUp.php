<?php
  session_start();
?>
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
        $GetVolunteerQuery = "SELECT * from user";
        $con->query($GetVolunteerQuery);
    }
    catch(Exception $e){
      $CreateOwnerTableQuery = "CREATE TABLE user(Username VARCHAR(255) PRIMARY KEY,Password VARCHAR(255) NOT NULL,Fullname VARCHAR(255) NOT NULL,Email VARCHAR(255) NOT NULL,Phone integer(12) NOT NULL)";
      $con->query($CreateOwnerTableQuery);
    }
    $CheckUserQuery = "SELECT * from user where Username='$username'";
      $result = $con->query($CheckUserQuery);
      if($result->num_rows > 0){
        echo "<script>
          alert('The user name is duplicate , please select another user name');
          window.location.href='../UserSignUp.html';
          </script>";
      }
      else{
        $sql = "INSERT INTO user VALUES ('$username', '$password', '$fullname', '$email', '$phonenumber')";
              mysqli_query($con, $sql);
              mysqli_close($con);

              echo "<script>
              alert('1 user has been registered');
              window.location.href='../MainPage.html';
              </script>";
      }
    ?>
