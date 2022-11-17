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
    $folder = '../Picture/';

    $Restaurantfilename = $restaurantName.'.jpg';
    $Restaurantfiletmpname = $_FILES['restaurantImage']['tmp_name'];
    move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);

    $sql = "SELECT RestaurantImage FROM restaurant WHERE RestaurantID = $restaurantID ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          unlink($folder.$row['RestaurantImage']);
        }
    }

    $restaurantImage = $Restaurantfilename;

    $sql = "SELECT RestaurantName, RestaurantImage, FoodOrDrinkName, Price FROM restaurant INNER JOIN foodanddrink ON restaurant.RestaurantId = foodanddrink.RestaurantId";
    $sql = "SELECT * FROM restaurant";
    $sql = "SELECT * FROM restaurant WHERE RestaurantId = $restaurantID";

    $sql = "UPDATE restaurant SET RestaurantName='$restaurantName', RestaurantImage='$restaurantImage' WHERE RestaurantId = $restaurantID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The restaurant has been updated');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
