<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DeliveryIt";
    $con = new mysqli($servername, $username, $password, $dbname);

    $foodDrink=$_POST['foodDrink'];
    $price=$_POST['price'];
    $FoodID=$_POST['foodID'];
    $foodOrDrinkImage=$_POST['foodOrDrinkImage'];


    $sql = "UPDATE foodandDrink SET FoodOrDrinkName='$foodDrink',Price= '$price', FoodOrDrinkImage='$foodOrDrinkImage' WHERE FoodID = $FoodID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The name of the food/drink and price has been updated');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
