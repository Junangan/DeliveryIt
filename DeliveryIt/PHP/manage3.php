<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "deliveryit";
    $con = new mysqli($servername, $username, $password, $dbname);

    $restaurantID=$_GET['Name'];

    $sql = "SELECT RestaurantImage FROM restaurant WHERE RestaurantID = $restaurantID ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
           unlink($folder.$row['RestaurantImage']);
        }
    }

    $sql="DELETE FROM restaurant WHERE RestaurantId = $restaurantID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('1 restaurant has been deleted');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
