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

    $sql = "SELECT * FROM restaurant WHERE FoodID = $foodID ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
           unlink($folder.$row['foodOrDrinkImage']);
        }
    }

    $sql="DELETE FROM foodanddrink  WHERE FoodId = $foodID";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    alert('1 food/drink has been deleted');
    window.location.href='../ManageRestaurant.php';
    </script>";
    ?>
