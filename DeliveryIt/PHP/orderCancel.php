<?php
   session_start();
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

    $FoodName=$_GET['Name'];

    $GetOrderQuery = "SELECT * from userorder";
    $con->query($GetOrderQuery);
    $sql = "DELETE FROM userorder WHERE FoodName = '$FoodName' ";
              mysqli_query($con, $sql);
              mysqli_close($con);

    echo "<script>
          window.history.back();
          </script>";
?>
