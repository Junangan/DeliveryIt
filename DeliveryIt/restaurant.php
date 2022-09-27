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
    <script type="text/javascript" src="JavaScript/script.js"></script>
    <script = src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <li class = "nav-item"><a class = "nav-link" href = "ManageUserProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "checkout.html"><img class="checkout" src="Picture/carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "chat.html"><img class="chat" src="Picture/chaticon.png" alt="Chat Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "home.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <br><br>
    <main>
    	<div class="row container-fluid justify-content-between">
	      <h3 style="padding-left: 10px;">All Restaurant</h3>
	      	<div class="dropdown">
	      	  <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
</svg>
              </span>
              <input type="text" class="form-control" placeholder="Search Restaurant or Food" aria-label="Input group example" aria-describedby="basic-addon1" id="myInput" onkeyup="filterFunction()">
            </div>
			  <button onclick="show()" class="dropbtn">Filter<i id='icon' class="fa fa-angle-down" style="padding-left: 6px;"></i></button>
			  <div id="myDropdown" class="dropdown-content">
			    <a href="#about" onclick="sortListByName()">Name A-Z</a>
			    <a href="#base" onclick="reverseSortListByName()">Name Z-A</a>
			    <a href="#blog"  onclick="clearFilter()">Clear</a>
			  </div>
			</div>
	    </div>
	    <div class="container">
        <div id="allRestaurant" class="row justify-content-between">
          <?php
                $conn = new mysqli ('localhost', 'root', '',"DeliveryIt");
                $GetRestaurantQuery = "SELECT * from restaurant";
                $result = $conn->query($GetRestaurantQuery);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<a class='restaurantLink' href='menu.php?Name={$row['RestaurantName']}'>
                    		<div class='restaurantName'>
                            {$row['RestaurantName']}
                            </div>
                          </a>";
                  }
                }
          ?>
        </div>
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
