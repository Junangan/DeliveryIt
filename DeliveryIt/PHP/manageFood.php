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
    $folder = '../Picture/';

    $sql = "SELECT FoodOrDrinkImage,RestaurantId FROM foodandDrink WHERE FoodID = $FoodID ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $FoodOrDrinkfilename = $row['RestaurantId'].'_'.$foodDrink.'.jpg';
            $FoodOrDrinkfiletmpname = $_FILES['foodOrDrinkImage']['tmp_name'];
            move_uploaded_file($FoodOrDrinkfiletmpname, $folder.$FoodOrDrinkfilename);
            $foodOrDrinkImage= $FoodOrDrinkfilename;

            unlink($folder.$row['FoodOrDrinkImage']);
        }
    }

    $sql = "UPDATE foodandDrink SET FoodOrDrinkName='$foodDrink',Price= '$price', FoodOrDrinkImage='$foodOrDrinkImage' WHERE FoodID = $FoodID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('The name of the food/drink and price has been updated');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
