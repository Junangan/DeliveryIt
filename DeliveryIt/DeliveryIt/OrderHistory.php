<!DOCTYPE html>
<?php
session_start();
//declaration and initialization
if(isset($_POST['submit'])){
  $Id = $_POST['id'];
  $Star = $_POST['star'];

  $SERVERNAME = "localhost";
  $dbUsername = "root";
  $dbPassword = "";

  $conn = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword);

  //checking the sql
  if($conn->connect_error){
    die("Some thing error <br>".$connect->connect_error);
  }

  $conn->select_db("DeliveryIt");


  $GetUserOrderQuery = "SELECT * from userorder WHERE OrderId='$Id'";
  $result = $conn->query($GetUserOrderQuery);
  $row = $result->fetch_assoc();
    $UpdateOrderQuery = "UPDATE userorder SET Rating='$Star' WHERE OrderId='$Id'";
    $conn->query($UpdateOrderQuery);
  echo "<script>
  alert('Change Successfully');
  </script>";

  $conn->close();
}
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
      *{
    margin: 0;
    padding: 0;
	}

	.rate {
	    float: left;
	    height: 46px;
	    padding: 0 10px;
	}
	.rate:not(:checked) > input {
	    position:absolute;
	    top:-9999px;
	}
	.rate:not(:checked) > label {
	    float:right;
	    width:1em;
	    overflow:hidden;
	    white-space:nowrap;
	    cursor:pointer;
	    font-size:20px;
	    color:#ccc;
	}
	.rate:not(:checked) > label:before {
	    content: '★ ';
	}
	.rate > input:checked ~ label {
	    color: #ffc700;    
	}

	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
	    color: #deb217;  
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
	    color: #c59b08;
	}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
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
              <li class = "nav-item"><a class = "nav-link" href = "Restaurant.php"> Restaurant </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "FavouriteList.php"> Favourite List </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "#"> View All Order History </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "ManageUserProfile.php"> Manage Profile </a></li>
              <li class = "nav-item"><a class = "nav-link" href = "Cart.php"><img class="checkout" src="Picture/carticon.png" alt="Cart Icon" style="width:30px;height:30px;"></a></li>
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
            <?php
            //Step 3: Display result
            $con = new mysqli ('localhost', 'root', '',"DeliveryIt");
            try{
                $GetRestaurantQuery = "SELECT * from userorder";
                $result = $con->query($GetRestaurantQuery);
                if (mysqli_num_rows($result) > 0) {
                	echo "<div class='container'>
                          <div id='allRestaurant' class='row justify-content-between'>
                            <div class = 'container'>
                          <table class='table'>
                            <thead>
                              <tr>
                                <th scope='col'>Restaurant Name</th>
                                <th scope='col'>Food Name</th>
                                <th scope='col'>Number Order</th>
                                <th scope='col'>Total price</th>
                                <th scope='col'>Status</th>
                                <th scope='col'>Rating</th>
                                <th scope='col'></th>
                              </tr>
                            </thead>
                            <tbody>";
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['RestaurantName']}</td>
                            <td>{$row['FoodName']}</td>
                            <td>{$row['FoodNumber']}</td>
                            <td>{$row['TotalPrice']}</td>
                            <td>{$row['Status']}</td>";

                      if($row['Rating']==0 && $row['Status']!='pending'){
                        echo "<td><div class='rate' id='rate{$row['OrderId']}'>
			                  <input type='radio' id='{$row['OrderId']}star5' name='rate{$row['OrderId']}' value='5' />
			                  <label for='{$row['OrderId']}star5' title='text'>5 stars</label>
			                  <input type='radio' id='{$row['OrderId']}star4' name='rate{$row['OrderId']}' value='4' />
			                  <label for='{$row['OrderId']}star4' title='text'>4 stars</label>
			                  <input type='radio' id='{$row['OrderId']}star3' name='rate{$row['OrderId']}' value='3' />
			                  <label for='{$row['OrderId']}star3' title='text'>3 stars</label>
			                  <input type='radio' id='{$row['OrderId']}star2' name='rate{$row['OrderId']}' value='2' />
			                  <label for='{$row['OrderId']}star2' title='text'>2 stars</label>
			                  <input type='radio' id='{$row['OrderId']}star1' name='rate{$row['OrderId']}' value='1' />
			                  <label for='{$row['OrderId']}star1' title='text'>1 star</label>
			                </div></td>
                            <td>
                                <form action='' method='Post' onsubmit='return checkStar({$row['OrderId']})' enctype='multipart/form-data'>
                                <input type='text' name='id'  value='{$row['OrderId']}' style='Display:none;'>
                                <input type='text' name='star' id='{$row['OrderId']}' value='' style='Display:none;'>
                                <input type='submit' class='btn' name='submit' value='rate'>
                                </form>
                                </td>
                          </tr>";
                      }
                      else if($row['Status']=='pending'){
                        echo "";
                      }
                      else{
                        echo "<td>You Rating {$row['Rating']} star</td>";
                      }
                  }
                }
            }
            catch(Exception $e){
                echo "<p style='text-align:center; padding-top:2.5%;'>
                          No any history
                        </p>";
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
    <script type="text/javascript">
      function checkStar(id){
        if (document.getElementById(id+'star5').checked) {
          document.getElementById(id).value = 5;
        }
        else if(document.getElementById(id+'star4').checked){
          document.getElementById(id).value = 4;
        }
        else if(document.getElementById(id+'star3').checked){
          document.getElementById(id).value = 3;
        }
        else if(document.getElementById(id+'star2').checked){
          document.getElementById(id).value = 2;
        }
        else if(document.getElementById(id+'star1').checked){
          document.getElementById(id).value = 1;
        }
        else{
          return false;
        }
      }
    </script>
  </body>
</html>
