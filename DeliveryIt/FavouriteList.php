<!DOCTYPE html>
<?php
  session_start();
?>
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
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "UserPage.php"> DeliveryIt </a>
            </div>
            <ul class = "nav navbar-nav navbar-left">
              <li class = "nav-item"><a class = "nav-link" href = "UserPage.php"> Home </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "restaurant.php"> Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"> Favourite List </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "OrderHistory.php"> View All Order History </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageUserProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "Cart.php"><img class="checkout" src="Picture/carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "chat.html"><img class="chat" src="Picture/chaticon.png" alt="Chat Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "MainPage.html"> Log out </a></li>

            </ul>
          </div>
        </nav>
    </header>
    <br><br>
    <section class="page-section" id="contact">
        <div class = "container">
          <h2> Favourite List </h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DeliveryIt";
        $con = new mysqli($servername, $username, $password, $dbname);
        if (!$con) {
         die("Could not connect to database");
        }

        try{
          $sql = "SELECT *
                FROM ((foodanddrink
                INNER JOIN restaurant ON restaurant.RestaurantId = foodandDrink.RestaurantId)
                INNER JOIN favourite ON favourite.FoodOrDrinkName = foodanddrink.FoodOrDrinkName)";

          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='row justify-content-md-center'>
                          <h3 id='restaurantName'>{$row['RestaurantName']}</h3>
                        </div>
                    <div class='food border p-3 row justify-content-between align-items-center'>
                            <p class='col-2' style='font-size:20px; text-align: center; margin-bottom: 0px;'>
                              {$row['FoodOrDrinkName']}
                            </p>
                            <p class='col-2' style='font-size:20px; text-align: center; margin-bottom: 0px;'>
                              Price: RM{$row['Price']}
                            </p>
                            <form class='col-5' action='PHP/menuAdd.php' method = 'post' style='text-align:end;'>
                              <input type='button' id='minus' value='-' onclick='minusNum()'>
                              <input type='text' value='{$row['FoodOrDrinkName']}' id='FoodName' name='FoodName' style='display:none;'>
                              <input type='text' value='0' name='numberPlace' id='numberPlace' style='width:50px;'>
                              <input type='button' id='plus' value='+' onclick='addNum()'>
                              <input type='submit' value='Add to Cart'>
                            </form>
                            <a href='PHP/DeleteFavourite.php?Name={$row['FoodOrDrinkName']}'>
                            Remove from Favourite List
                            </a>
                          </div>
                          ";
                  }
                }
        }
        catch(Exception $e){
          echo "<p style='text-align:center; padding-top:2.5%;'>
                    No any food in the list.
                  </p>";
        }
        ?>
        </div>

    </section>

    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
