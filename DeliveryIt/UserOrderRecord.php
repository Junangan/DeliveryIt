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
              <a class = "navbar-brand" href = "OwnerPage.php"> DeliveryIt </a>
            </div>
            <ul class = "nav navbar-nav navbar-left">
              <li class = "nav-item"><a class = "nav-link" href = "OwnerPage.php"> Home </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "AddRestaurant.html"> Add Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageRestaurant.php"> Manage Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"> View All User Order Record </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageOwnerProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "chat.html"><img class="chat" src="Picture/chaticon.png" alt="Chat Icon" style="width:30px;height:30px;"></a></li>
              <li class = "nav-item"><a class = "nav-link" href = "MainPage.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <br><br>
    <main>
    	<div class="row container-fluid justify-content-center">
	      <h3>All order History</h3>
	    </div>
	    <div class="container">
        <div id="allRestaurant" class="row justify-content-between">
          <div class = "container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Restaurant Name</th>
              <th scope="col">Food Name</th>
              <th scope="col">Number Order</th>
              <th scope="col">Total price</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //Step 3: Display result
            $con = new mysqli ('localhost', 'root', '',"DeliveryIt");
                $GetRestaurantQuery = "SELECT * from userorder";
                $result = $con->query($GetRestaurantQuery);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['RestaurantName']}</td>
                            <td>{$row['FoodName']}</td>
                            <td>{$row['FoodNumber']}</td>
                            <td>{$row['TotalPrice']}</td>
                            <td>{$row['Status']}</td>
                          </tr>";
                  }
                }
                else {
                  echo"<p>No history</p>";
                }
            ?>
          </tbody>
      </table>
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
