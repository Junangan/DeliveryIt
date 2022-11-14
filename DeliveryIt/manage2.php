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
    $restaurantID=$_POST['restaurantID'];
    $image=$_POST['image'];

    $sql = "SELECT RestaurantName, Image, FoodOrDrinkName, Price FROM restaurant INNER JOIN foodanddrink ON restaurant.RestaurantId = foodanddrink.RestaurantId";
    $sql = "SELECT * FROM restaurant";
    $sql = "SELECT * FROM restaurant WHERE RestaurantId = $restaurantID";

    $sql = "UPDATE restaurant SET RestaurantName='$restaurantName', Image='$image' WHERE RestaurantId = $restaurantID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The restaurant has been updated');
    window.location.href='ManageRestaurant.php';
    </script>";
    ?>
