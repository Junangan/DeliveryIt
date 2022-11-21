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
    <link rel= "stylesheet" href="CSS/style.css">
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
    $dbname = "deliveryit";
    $con = new mysqli($servername, $username, $password, $dbname);
    if (!$con) {
     die("Could not connect to database");
    }

    $RestaurantName;
    $foodDrink = $_POST["foodDrink"];
    $price;

    $CheckOwnerQuery = "SELECT * from favourite where FoodOrDrinkName='$foodDrink'";

    $result = $con->query($CheckOwnerQuery);
        if($result->num_rows > 0){
          echo "<script>
          alert('The name of the food or drink is duplicate , please choose another food or drink');
          window.location.href='../restaurant.php';
          </script>";
        }
        else{
           $sql = "INSERT INTO favourite (FoodOrDrinkName)
                   VALUES ('$foodDrink')";
            mysqli_query($con, $sql);
            mysqli_close($con);

            echo "<script>
            alert('1 item has been added to the favourite list');
            window.location.href='../FavouriteList.php';
            </script>";
        }
    ?>

      </div>
    </main>
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "../UserPage.php"> DeliveryIt </a>
            </div>
          </div>
        </nav>
    </header>
    <div class = "container">
      <form action="../FavouriteList.php" method = "post"><br>
        <input type="submit" name="Submit" value="Done">
      </form>
    </div>

    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
