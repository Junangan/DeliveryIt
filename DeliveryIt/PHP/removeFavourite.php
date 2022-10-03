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

    $RestaurantName = $_GET['Name'];


    //using try to check the table is create or no,if no then will create the relate table
    try{
        $GetOrderQuery = "SELECT * from Favourite";
        $con->query($GetOrderQuery);
    }
    catch(Exception $e){
      $CreateTableQuery = "CREATE TABLE Favourite(FavouriteId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,RestaurantName VARCHAR(255) NOT NULL)";
      $con->query($CreateTableQuery);
    }
    $sql="DELETE FROM Favourite  WHERE RestaurantName = '$RestaurantName'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    window.history.back();
    </script>";
?>