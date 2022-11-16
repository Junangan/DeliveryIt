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
    <style>
.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-50{
  padding: 0 16px;
}

.cardPayment {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}


</style>
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
        <h3 id="restaurantName">Cart</h3>
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
                    echo "<div class='cartRestaurant'>";
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
                  echo'<div class="row justify-content-md-center">
        <h3 id="restaurantName">Checkout</h3>
      </div>';
                  echo '<div class="border border-dark">
                      <div class="comfirmBuy align-items-center justify-content-between mt-3">
                          <p id="totalPrice">
                          Total Price = RM';
                            echo ($cartPrice);
                         echo' </p>
                          <div class="mr-3">
                            <label for="date">Delivery Time:</label>
                            <input type="datetime-local" id="date" name="date">
                          </div>
                          </div>
                          <hr style="background-color:#B2B2B2">
                          <div class="address">
                            <label for="address">Address:</label>
                            <input class="rounded" type="text" id="address" name="address" placeholder="Enter Full address">
                          </div>
                          <hr style="background-color:#B2B2B2">
                          <div class="comfirmBuy  align-items-center ">
                          <div class="col-3">
                          <p>Payment Method:</p>
                          </div>
                          <div class="col row justify-content-around">
                            <div>
                        <input type="radio" id="cash" name="method" value="cash" checked>
                <label for="cash">Cash</label><br>
              </div>
              <div >
              <input type="radio" id="card" name="method" value="card">
                <label for="card">Debit or Credit Card</label><br>
              </div>
              </div>
              </div>
            <div class="col-50" id="Paymentcard">
                    <label for="cname">Name on Card</label>
                    <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                    <label for="ccnum">Credit card number</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="September">
                    <div class="row">
                      <div class="col-50">
                        <label for="expyear">Exp Year</label>
                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                      </div>
                      <div class="col-50">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="352">
                      </div>
                    </div>
                          </div>
                          <a class="CheckOutbutton border-top border-dark" href="PHP/Checkout.php">
                              Confirm  
                          </a>
                          </div>
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

        document.getElementById('Paymentcard').style.display = "none";
        document.getElementById('card').onclick = function() {document.getElementById('Paymentcard').style.display = "block";};
        document.getElementById('cash').onclick = function() {document.getElementById('Paymentcard').style.display = "none";};
    </script>
  </body>
</html>
