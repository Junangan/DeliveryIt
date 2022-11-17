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
    $folder = '../Picture/';

    try{
      $GetRestaurentQuery = "SELECT * from restaurant";
      $con->query($GetRestaurentQuery);
    }
    catch(Exception $e){
      $CreateOwnerTableQuery = "CREATE TABLE restaurant(RestaurantId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,RestaurantName VARCHAR(255) NOT NULL,ratingNumber integer(10),star integer(10), RestaurantImage BLOB NOT NULL)";
      $con->query($CreateOwnerTableQuery);
      $CreateTableQuery = "CREATE TABLE foodanddrink(FoodId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,FoodOrDrinkName VARCHAR(255) NOT NULL,Price DECIMAL(10,2) NOT NULL, FoodOrDrinkImage BLOB NOT NULL, RestaurantId integer REFERENCES restaurant(RestaurantId) )";
      $con->query($CreateTableQuery);
    }

    $GetRestaurentAndFoodQuery = "SELECT * from restaurant
                                  INNER JOIN foodanddrink
                                  ON restaurant.RestaurantId = foodanddrink.RestaurantId
                                  WHERE restaurant.RestaurantName = '$restaurantName'
                                  AND foodanddrink.FoodOrDrinkName = '$foodDrink'";
    $result =$con->query($GetRestaurentAndFoodQuery);
    if($result->num_rows > 0){
    }
    else{
      $GetRestaurentQuery = "SELECT * from restaurant WHERE RestaurantName = '$restaurantName'";
      $result =$con->query($GetRestaurentQuery);
      if($result->num_rows > 0){
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $FoodOrDrinkfilename = $row['RestaurantId'].'_'.$foodDrink.'.jpg';
            }
        }
        $FoodOrDrinkfiletmpname = $_FILES['foodOrDrinkImage']['tmp_name'];

        move_uploaded_file($FoodOrDrinkfiletmpname, $folder.$FoodOrDrinkfilename);


        $foodOrDrinkImage=$FoodOrDrinkfilename;
        
        $sql = "INSERT INTO foodanddrink (FoodOrDrinkName, Price, FoodOrDrinkImage,RestaurantId)
                VALUES ('$foodDrink', '$price', '$foodOrDrinkImage',(SELECT RestaurantId from restaurant WHERE RestaurantName='$restaurantName'))";
        mysqli_query($con, $sql);
        echo "<script>
        alert('1 restaurant and 1 food/drink has been added');
        window.location.href='../AddRestaurant.html';
        </script>";
      }
      else{
        $Restaurantfilename = $restaurantName.'.jpg';
        $Restaurantfiletmpname = $_FILES['restaurantImage']['tmp_name'];

        move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);

        $restaurantImage=$Restaurantfilename;        
        $sql = "INSERT INTO restaurant (RestaurantName, RestaurantImage)
            VALUES ('$restaurantName', '$restaurantImage')";
        mysqli_query($con, $sql);


        $GetRestaurentQuery = "SELECT RestaurantId from restaurant WHERE RestaurantName = '$restaurantName'";
        $result =$con->query($GetRestaurentQuery);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $FoodOrDrinkfilename = $row['RestaurantId'].'_'.$foodDrink.'.jpg';
            }
        }
        $FoodOrDrinkfiletmpname = $_FILES['foodOrDrinkImage']['tmp_name'];

        move_uploaded_file($FoodOrDrinkfiletmpname, $folder.$FoodOrDrinkfilename);


        $foodOrDrinkImage=$FoodOrDrinkfilename;

        $sql = "INSERT INTO foodanddrink (FoodOrDrinkName, Price, FoodOrDrinkImage,RestaurantId)
                VALUES ('$foodDrink', '$price', '$foodOrDrinkImage',(SELECT RestaurantId from restaurant WHERE RestaurantName='$restaurantName'))";
        mysqli_query($con, $sql);
        echo "<script>
        alert('1 restaurant and 1 food/drink has been added');
        window.location.href='../AddRestaurant.html';
        </script>";
      }
    }
    mysqli_close($con);
    ?>
