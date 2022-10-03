<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width initial-scale = 1">
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
              <li class = "nav-item"><a class = "nav-link" href = "favourites.php"> Favourite List </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"> View All Order History </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageUserProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"><img class="checkout" src="Picture/carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"><img class="chat" src="Picture/chaticon.png" alt="Chat Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "MainPage.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <main>
      <div class="container">
      <div class="row justify-content-md-center">
        <h3 id="restaurantName">"Cart"</h3>
      </div>
      <?php
                session_start();
                $conn = new mysqli ('localhost', 'root', '',"DeliveryIt");
                $UserName = $_SESSION['username'];
                $GetOrderQuery = "SELECT * from userOrder WHERE user  =  '$UserName' And status ='pending' ";
                $result = $conn->query($GetOrderQuery);
                $cartPrice = '0';
                if (mysqli_num_rows($result) > 0) {
                  $RestaurantName = '';
                  while($row = mysqli_fetch_assoc($result)) {
                    $cartPrice +=$row['TotalPrice'];
                    echo "<div>";
                    if($RestaurantName!=$row['RestaurantName']){
                      echo "<div>
                              <p id='cartRestaurant'>
                                {$row['RestaurantName']}
                              </p>
                            </div>";
                      $RestaurantName=$row['RestaurantName'];
                    }
                      echo " <div class='food row justify-content-between'>
                              <p class='col-5'>
                                {$row['FoodName']}
                              </p>
                              <p class='col-1'>
                                {$row['FoodNumber']}
                              </p>
                              <p class='col-2'>
                                RM{$row['TotalPrice']}

                              </p>
                              <a class='col-2' href='PHP/orderCancel.php?Name={$row['FoodName']}'>
                                'remove'        
                              </a>
                            </div>
                          </div>
                          ";
                  }
                  echo '<div class="comfirmBuy align-items-center border justify-content-between">
                          <p id="totalPrice">
                          Total Price = RM';
                            echo ($cartPrice);
                         echo' </p>
                          <div>
                            <label for="date">Delivery Time:</label>
                            <input type="datetime-local" id="date" name="date">
                          </div>
                          <button type="submit" onclick="window.location.href="PHP/Checkout.php";">
                              Confirm  
                          </button>
                        </div>';
                }
                else{
                  echo "<p style='text-align:center; padding-top:2.5%;'>
                    No any food in the cart.
                  </p>";
                }
          ?>
    </main>
    <hr>
    <div>
      <footer id ="footer" class ="clear copyright">
        <p> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </p>
      </footer>
    </div>
    <script>
      var d = new Date();
        m = d.getMonth() + 1;
        mi = d.getMinutes();
        day = d.getDate();
        h = d.getHours();
        if(m<10){
          m='0' + m;
        }
        if(day<10){
          day = '0' + day;
        }
        if(h<10){
          h = '0' +h;
        }
        if(mi<10){
          mi='0' + mi;
        }
        nowTime = d.getFullYear()+"-"+m+"-"+day+"T"+h+":"+mi;
        document.getElementById('date').value=nowTime;
    </script>
  </body>
</html>
