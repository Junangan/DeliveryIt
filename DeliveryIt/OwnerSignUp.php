<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $con = new mysqli($servername, $username, $password);

    try{
    	$con->select_db("deliveryIt");
    }
    catch(Exception $e){
    	$CreateDatabase = "CREATE DATABASE deliveryIt";
      	$con->query($CreateDatabase);
      	$con->select_db("deliveryIt");
    }

    $username=$_POST['username'];
    $password=$_POST['password'];

    //using try to check the table is create or no,if no then will create the relate table
    try{
    	$GetOwnerQuery = "SELECT * from owner";
    	$con->query($GetOwnerQuery);
    }
    catch(Exception $e){
    	$CreateOwnerTableQuery = "CREATE TABLE owner(Username VARCHAR(255) PRIMARY KEY,Password VARCHAR(255) NOT NULL,Fullname VARCHAR(255) NOT NULL,Email VARCHAR(255) NOT NULL,Phone integer(12) NOT NULL)";
      	$con->query($CreateOwnerTableQuery);
    }
    $CheckOwnerQuery = "SELECT * from owner where Username='$username'";
    $result = $con->query($CheckOwnerQuery);
        if($result->num_rows > 0){
          echo "<script>
          alert('The user name is duplicate , please select another user name');
          window.location.href='OwnerSignUp.html';
          </script>";
        }
        else{
           $sql = "INSERT INTO owner (Username, Password)
            VALUES ('$username', '$password')";
            mysqli_query($con, $sql);
            mysqli_close($con);
            echo "<script>
            alert('1 owner has been registered');
            window.location.href='MainPage.html';
            </script>";
        }
    ?>
