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
    <header id = "header" class = "clear">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class = "container-fluid">
            <div class = "navbar-header">
              <a class = "navbar-brand" href = "home.html"> DeliveryIt </a>
            </div>
            <ul class = "nav navbar-nav navbar-left">
              <li class = "nav-item"><a class = "nav-link" href = "home.php"> Home </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "restaurant.php"> Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "favourites.php"> Favourite List </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "orderhistory.html"> View All Order History </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "profile2.html"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "checkout.html"><img class="checkout" src="carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "chat.html"><img class="chat" src="chaticon.png" alt="Chat Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "home.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <br><br>
    <section class="page-section" id="contact">
      <div class = "container"><br><br><br>
        <h2> Restaurant </h2><br>
        <form class="form-horizontal" action="order.html" method = "post">
          <div class="form-group">
            <div class="col-sm-offset-4 col-md-10">
              <h2 style="text-decoration: none; color: black;">
                <img src="2chicken.png" alt="2-pc Chicken" style = "width:400px; height:200px;">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2-pc Chicken </h2>
                <input type="submit" class = "btn btn-success" name="Order" value="Order">
              </div>
            </div>
          </form>
          <form class="form-horizontal" action="favourites.php" method = "post">
            <div class="form-group">
              <div class="col-sm-offset-4 col-md-10">
                <input type="submit" class = "btn btn-success" name="Add to Favourite List" value="Add to Favourite List">
              </div>
            </div>
          </form>

        <br><br>

        <form class="form-horizontal" action="order2.html" method = "post">
          <div class="form-group">
            <div class="col-sm-offset-4 col-md-10">
              <h2 style="text-decoration: none; color: black;">
                <img src="1ricecombo.png" alt="1-pc Rice Combo" style = "width:400px; height:200px;">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1-pc Rice Combo </h2>
                <input type="submit" class = "btn btn-success" name="Order" value="Order">
              </div>
            </div>
          </form>
          <form class="form-horizontal" action="favourites.php" method = "post">
            <div class="form-group">
              <div class="col-sm-offset-4 col-md-10">
                <input type="submit" class = "btn btn-success" name="Add to Favourite List" value="Add to Favourite List">
              </div>
            </div>
          </form>

        <br><br>

        <form class="form-horizontal" action="order3.html" method = "post">
          <div class="form-group">
            <div class="col-sm-offset-4 col-md-10">
              <h2 style="text-decoration: none; color: black;">
                <img src="2ricecombo.png" alt="2-pc Rice Combo" style = "width:400px; height:200px;">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2-pc Rice Combo </h2>
                <input type="submit" class = "btn btn-success" name="Order" value="Order">
              </div>
            </div>
          </form>
          <form class="form-horizontal" action="favourites.php" method = "post">
            <div class="form-group">
              <div class="col-sm-offset-4 col-md-10">
                <input type="submit" class = "btn btn-success" name="Add to Favourite List" value="Add to Favourite List">
              </div>
            </div>
          </form>
      </div>

    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
