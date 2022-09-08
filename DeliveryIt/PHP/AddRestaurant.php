<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width initial-scale = 1">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">
    <link rel = "stylesheet" href = "/css/bootstrap.min.css">
    <link rel= "stylesheet" href="style.css">
    <script = src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "js/bootstrap.min.js"></script>
    <style type = "text/css">
      ul{
        padding: 10px;
      }
    </style>
    <title> DeliveryIt </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DeliveryIt";
    $con = new mysqli($servername, $username, $password, $dbname);

    $restaurantName=$_POST['restaurantName'];
    $foodDrink=$_POST['foodDrink'];
    $price=$_POST['price'];

    try{
      $GetRestaurentQuery = "SELECT * from restaurant";
      $con->query($GetRestaurentQuery);
    }
    catch(Exception $e){
      $CreateOwnerTableQuery = "CREATE TABLE restaurant(RestaurantId integer NOT NULL AUTO_INCREMENT PRIMARY KEY,RestaurantName VARCHAR(255),FoodOrDrink VARCHAR(255) NOT NULL,Price integer(10) NOT NULL)";
      $con->query($CreateOwnerTableQuery);
    }
    $sql = "INSERT INTO restaurant (RestaurantName, FoodOrDrink, Price)
            VALUES ('$restaurantName', '$foodDrink', '$price')";
    mysqli_query($con, $sql);
    mysqli_close($con);
    ?>
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "home.html"> DeliveryIt </a>
            </div>
          </div>
        </nav>
    </header>
    <div class = "container">
      <form action="add.html" method = "post"><br>
        <input type="submit" name="Submit" value="Thank You">
      </form>
    </div>

    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
