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

    $foodDrink=$_GET['Name'];

    $GetOrderQuery = "SELECT * from favourite";
    $con->query($GetOrderQuery);
    $sql = "DELETE FROM favourite WHERE FoodOrDrinkName = '$foodDrink' ";
              mysqli_query($con, $sql);
              mysqli_close($con);

    echo "<script>
    alert('1 item has been removed from the favourite list');
    window.location.href='../FavouriteList.php';
    </script>";
?>
