<?php
  session_start();
?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DeliveryIt";
    $con = new mysqli($servername, $username, $password, $dbname);

    $foodID=$_GET['Name'];

    $sql="DELETE FROM foodanddrink  WHERE FoodId = $foodID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('1 food/drink has been deleted');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
