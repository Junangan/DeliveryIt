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
    $folder = 'Picture/';

    $sql = "SELECT RestaurantName, RestaurantImage, FoodOrDrinkName, Price FROM restaurant INNER JOIN foodanddrink ON restaurant.RestaurantId = foodanddrink.RestaurantId";
    $sql = "SELECT * FROM restaurant";
    $sql = "SELECT * FROM restaurant WHERE RestaurantId = $restaurantID";

    $sql = "SELECT RestaurantImage FROM restaurant WHERE RestaurantID = $restaurantID ";
    $result = mysqli_query($con, $sql);
    if($result==null && $_FILES['RestaurantImage']['name']==null){
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName' WHERE RestaurantID = $restaurantID";
    }
    else if($result==null){
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['RestaurantImage']['tmp_name'];

      move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',RestaurantImage='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    else if($_FILES['RestaurantImage']['name']==null){
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['RestaurantImage']['tmp_name'];
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              rename($folder. $row['RestaurantImage'],$folder.$Restaurantfilename);
            }
        }
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',RestaurantImage='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    else{
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['RestaurantImage']['tmp_name'];
      move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              unlink($folder.$row['RestaurantImage']);
            }
        }
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',RestaurantImage='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The restaurant has been updated');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
