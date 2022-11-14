<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deliveryit";
    $con = new mysqli($servername, $username, $password, $dbname);

    $restaurantID=$_POST['restaurantID'];

    $sql="DELETE FROM restaurant WHERE RestaurantId = $restaurantID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('1 restaurant has been deleted');
    window.location.href='ManageRestaurant.php';
    </script>";
    ?>
