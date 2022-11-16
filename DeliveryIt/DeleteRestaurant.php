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
              <a class = "navbar-brand" href = "OwnerPage.php"> DeliveryIt </a>
            </div>
             <ul class = "nav navbar-nav navbar-left">
              <li class = "nav-item"><a class = "nav-link" href = "OwnerPage.php"> Home </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "AddRestaurant.html"> Add Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageRestaurant.php"> Manage Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "UserOrderRecord.php"> View All User Order Record </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageOwnerProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "MainPage.html"> Log out </a></li>
            </ul>
          </div>
        </nav>
    </header>
    <br><br>
    <section class="page-section" id="contact">
      <div class = "container"><br>
        <h2> Delete Restaurant </h2>
        <?php
        //Step 1: Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "DeliveryIt";
        $con = new mysqli($servername, $username, $password, $dbname);
        if (!$con) {
         die("Could not connect to database");
         }

        //Step 2: Query
        $sql = "SELECT * FROM restaurant WHERE RestaurantId > 0";
        $result = mysqli_query($con, $sql);
        ?>
        <div class = "container">
          <table border="1">
            <thead>
              <tr>
                <th>Image</th>
                <th>Restaurant ID</th>
                <th>Restaurant Name</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //Step 3: Display result
              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                 while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>
                              <td><img src = Picture/{$row['RestaurantImage']} height='110', width='110'></td>
                              <td>{$row['RestaurantId']}</td>
                              <td>{$row['RestaurantName']}</td>
                            </tr>";
                  }

              } else {
                  echo "";
              }
              ?>
            </tbody>
        </table>
    </div><br><br>
            <form class="form-horizontal" action="PHP/manage3.php" method = "post">
              <div class="form-group">
                <label class="control-label col-sm-2" for="fullname">Restaurant ID:</label>
                <div class="col-sm-6">
                  <select name="restaurantID" id="restaurantID" required>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "DeliveryIt";
                    $con = new mysqli($servername, $username, $password, $dbname);
                    if (!$con) {
                     die("Could not connect to database");
                     }

                    $sql = "SELECT * FROM restaurant WHERE RestaurantId > 0";
                    $result = mysqli_query($con, $sql);
                    ?>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                        echo
                        "<option>{$row['RestaurantId']}</option>";
                      }
                    }
                    else {
                      echo "";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-4 col-md-10">
                  <input type="submit" class = "btn btn-success" name="Delete" value="Delete">
                </div>
              </div>
            </form>
            <br><br>
    </section>
    <div>
      <footer id = "footer" class = "clear">
        <h5> Copyright &copy; 2022 DeliveryIt. All Right Reserved. </h5>
      </footer>
    </div>
  </body>
</html>
