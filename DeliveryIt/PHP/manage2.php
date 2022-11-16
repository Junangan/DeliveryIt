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

    $sql = "SELECT RestaurantName, FoodOrDrink, Price FROM restaurant INNER JOIN foodandDrink ON restaurant.RestaurantId = foodandDrink.RestaurantId";
    $sql = "SELECT * FROM restaurant";
    $sql = "SELECT * FROM restaurant WHERE RestaurantID = $restaurantID";

    $sql = "SELECT image FROM restaurant WHERE RestaurantID = $restaurantID ";
    $result = mysqli_query($con, $sql);
    if($result==null && $_FILES['restaurantfile']['name']==null){
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName' WHERE RestaurantID = $restaurantID";
    }
    else if($result==null){
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['restaurantfile']['tmp_name'];

      move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',image='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    else if($_FILES['restaurantfile']['name']==null){
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['restaurantfile']['tmp_name'];
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              rename($folder. $row['image'],$folder.$Restaurantfilename);
            }
        }
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',image='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    else{
      $Restaurantfilename = $restaurantName.'.jpg';
      $Restaurantfiletmpname = $_FILES['restaurantfile']['tmp_name'];
      move_uploaded_file($Restaurantfiletmpname, $folder.$Restaurantfilename);
      if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              unlink($folder.$row['image']);
            }
        }
      $sql = "UPDATE restaurant SET RestaurantName='$restaurantName',image='$Restaurantfilename' WHERE RestaurantID = $restaurantID";
    }
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The restaurant has been updated');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
