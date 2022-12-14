<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin = "anonymous">
    <link rel = "stylesheet" href = "/css/bootstrap.min.css">
    <link rel= "stylesheet" href="CSS/style.css">
    <script type="text/javascript" src="JavaScript/script.js"></script>
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
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "UserPage.php"> DeliveryIt </a>
            </div>
            <ul class = "nav navbar-nav navbar-left">
              <li class = "nav-item"><a class = "nav-link" href = "UserPage.php"> Home </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "restaurant.php"> Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "FavouriteList.php"> Favourite List </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "OrderHistory.php"> View All Order History </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageUserProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "Cart.php"><img class="checkout" src="Picture/carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "MainPage.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <div class = "container">
    <?php
            $conn = new mysqli ('localhost', 'root', '',"DeliveryIt");
            $RestaurantName = $_GET['Name'];
            $_SESSION['restaurant'] = $RestaurantName;
            $GetRestaurantQuery = "SELECT * from foodanddrink INNER JOIN restaurant ON restaurant.RestaurantId = foodanddrink.RestaurantId WHERE RestaurantName  =  '$RestaurantName' ";
            $result = $conn->query($GetRestaurantQuery);
            echo "<h3>Menu</h3>
            <form class='form-horizontal' action='PHP/favourite.php' method = 'post'>
              <div class= 'form-group'>
                <label class='control-label col-sm-8' for='foodDrink'>Choose your favourite food or drink:</label>
                <div class='col-sm-6'>
                  <select name='foodDrink' id='foodDrink' required>";
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<option>{$row['FoodOrDrinkName']}</option>";
              }
            }
            else {
              echo "";
            }
            echo "</select>
                  <input type='submit' name='List' value='Add to Favourite List'>
                  </form>";
      ?>
    </div>

        <?php
                $conn = new mysqli ('localhost', 'root', '',"DeliveryIt");
                $RestaurantName = $_GET['Name'];
                $_SESSION['restaurant'] = $RestaurantName;
                $GetRestaurantQuery = "SELECT * from foodanddrink INNER JOIN restaurant ON restaurant.RestaurantId = foodanddrink.RestaurantId WHERE RestaurantName  =  '$RestaurantName'";
                $result = $conn->query($GetRestaurantQuery);
                if (mysqli_num_rows($result) > 0) {
                  $RestaurantNameLoop = true;
                  $numRow = 0;
                  while($row = mysqli_fetch_assoc($result)) {
                    $numRow+=1;
                    if( $RestaurantNameLoop == true){
                      echo "<div class='row justify-content-md-center'>
                            <h3 id='restaurantName'>{$row['RestaurantName']}</h3>
                          </div>";
                      $RestaurantNameLoop = false;
                    }
                    echo "<div class='food border p-3 row justify-content-between align-items-center'>
                            <img src = Picture/{$row['FoodOrDrinkImage']} height='170', width='236'>
                            <p class='col-2' style='font-size:20px; text-align: center; margin-bottom: 0px;'>
                              {$row['FoodOrDrinkName']}
                            </p>
                            <p class='col-2' style='font-size:20px; text-align: center; margin-bottom: 0px;'>
                              Price: RM{$row['Price']}
                            </p>
                            <form class='col-5' action='PHP/menuAdd.php' method = 'post' style='text-align:end;'>
                              <input type='button' id='minus' value='-' onclick='minusNum({$numRow})'>
                              <input type='text' value='{$row['FoodOrDrinkName']}' id='FoodName' name='FoodName' style='display:none;'>
                              <input type='text' value='0' name='numberPlace' id='{$numRow}' style='width:50px;'>
                              <input type='button' id='plus' value='+' onclick='addNum({$numRow})'>
                              <input type='submit' value='Add to Cart'>
                            </form>
                          </div>
                          ";
                  }
                }
          ?>
      </div>
    </main>
    <hr>
    <div>
      <footer id ="footer" class ="clear copyright">
        <p> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </p>
      </footer>
    </div>
  </body>
</html>
