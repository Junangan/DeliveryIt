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
    $RestaurantName = $_SESSION['restaurant'];


    //using try to check the table is create or no,if no then will create the relate table
    try{
        $GetOrderQuery = "SELECT * from UserOrder";
        $con->query($GetOrderQuery);
    }
    catch(Exception $e){
      $CreatefoodOwnerTableQuery = "CREATE TABLE UserOrder(OrderId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,RestaurantName VARCHAR(255) NOT NULL,FoodName VARCHAR(255)NOT NULL,FoodNumber  integer(10) NOT NULL,TotalPrice float(10) NOT NULL,Status VARCHAR(255) NOT NULL,user VARCHAR(255) NOT NULL)";
      $con->query($CreatefoodOwnerTableQuery);
    }

      $GetOrderQuery = "SELECT * from UserOrder WHERE FoodName='$FoodName' AND RestaurantName='$RestaurantName' AND user=$UserName";
      $result = $con->query($GetOrderQuery);
      if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $newNumber = $row['FoodNumber'] + $FoodNumber;
        $Price = $row['TotalPrice'] /$row['FoodNumber'] * $newNumber;
        $sql = "UPDATE UserOrder SET FoodNumber ='$newNumber' , TotalPrice ='$Price' WHERE FoodName=$FoodName AND RestaurantName=$RestaurantName AND user=$UserName";
          mysqli_query($con, $sql);
          mysqli_close($con);
          echo "<script>
          alert('Food Name $FoodName update $FoodNumber successfully,currently have $newNumber number');
          window.history.back();
          </script>";
      }
      else{
        $getFoodQuery = "SELECT * from restaurant INNER JOIN foodandDrink ON restaurant.RestaurantId = foodandDrink.RestaurantId WHERE foodandDrink.FoodOrDrinkName='$FoodName' AND restaurant.RestaurantName='$RestaurantName'";
        $result = $con->query($getFoodQuery);
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if($FoodNumber != 0){
              $Price = $row['Price'] * $FoodNumber;
              $sql = "INSERT INTO UserOrder (RestaurantName,FoodName,FoodNumber,TotalPrice, Status,user) Values ('$RestaurantName','$FoodName', '$FoodNumber','$Price', '$status',$UserName)";
                mysqli_query($con, $sql);
                mysqli_close($con);
                echo "<script>
              alert('Food Name $FoodName add $FoodNumber successfully');
              window.history.back();
              </script>";
            }
            else{
              echo "<script>
              window.history.back();
              </script>";
            }
        }
      }
?>