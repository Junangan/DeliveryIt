<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DeliveryIt";
    $con = new mysqli($servername, $username, $password, $dbname);

    $restaurantName=$_POST['restaurantName'];
    $foodDrink=$_POST['foodDrink'];
    $price=$_POST['price'];
    $image=$_POST['image'];

    try{
      $GetRestaurentQuery = "SELECT * from restaurant";
      $con->query($GetRestaurentQuery);
    }
    catch(Exception $e){
      $CreateOwnerTableQuery = "CREATE TABLE restaurant(RestaurantId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,RestaurantName VARCHAR(255) NOT NULL,ratingNumber integer(10),star integer(10))";
      $con->query($CreateOwnerTableQuery);
      $CreateTableQuery = "CREATE TABLE foodanddrink(FoodId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,FoodOrDrinkName VARCHAR(255) NOT NULL,Price DECIMAL(10,2) NOT NULL,RestaurantId integer REFERENCES restaurant(RestaurantId) )";
      $con->query($CreateTableQuery);
    }

    $GetRestaurentAndFoodQuery = "SELECT * from restaurant INNER JOIN foodanddrink ON restaurant.RestaurantId = foodanddrink.RestaurantId WHERE restaurant.RestaurantName = '$restaurantName' AND foodanddrink.FoodOrDrinkName = '$foodDrink'";
    $result =$con->query($GetRestaurentAndFoodQuery);
    if($result->num_rows > 0){
    }
    else{
      $GetRestaurentQuery = "SELECT * from restaurant WHERE RestaurantName = '$restaurantName'";
      $result =$con->query($GetRestaurentQuery);
      if($result->num_rows > 0){
        $sql = "INSERT INTO foodanddrink (FoodOrDrinkName, Price,RestaurantId)
            VALUES ('$foodDrink', '$price',(SELECT RestaurantId from restaurant WHERE RestaurantName='$restaurantName'))";
        mysqli_query($con, $sql);
        echo "<script>
        alert('1 restaurant and 1 food/drink has been added');
        window.location.href='../AddRestaurant.html';
        </script>";
      }
      else{
        $sql = "INSERT INTO restaurant (RestaurantName, Image)
            VALUES ('$restaurantName', '$image')";
        mysqli_query($con, $sql);
        $sql = "INSERT INTO foodanddrink (FoodOrDrinkName, Price,RestaurantId)
            VALUES ('$foodDrink', '$price',(SELECT RestaurantId from restaurant WHERE RestaurantName='$restaurantName'))";
        mysqli_query($con, $sql);
        echo "<script>
        alert('1 restaurant and 1 food/drink has been added');
        window.location.href='../AddRestaurant.html';
        </script>";
      }
    }
    mysqli_close($con);
    ?>
