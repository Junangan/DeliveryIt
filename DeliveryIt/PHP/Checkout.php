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

    $FoodName=$_POST['FoodName'];
    $FoodNumber=$_POST['numberPlace'];
    $status = 'pending';
    $UserName = $_SESSION['username'];

    // $GetOrderQuery = "SELECT * from userOrder WHERE user  =  '$UserName' And status ='pending' ";
    // $result = $conn->query($GetOrderQuery);

    $sql = "UPDATE UserOrder SET status ='Complete' WHERE user  =  '$UserName' And status ='pending' ";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "<script>
          alert('Done');
          window.history.back();
          </script>";
?>