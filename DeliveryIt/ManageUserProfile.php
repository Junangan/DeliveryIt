

<?php
session_start();
//declaration and initialization
if(isset($_POST['submit'])){
	$Password = $_POST['password'];
	$Name = $_POST['fullName'];
	$email =$_POST['email'];
	$PhoneNum = $_POST['phoneNumber'];

	$SERVERNAME = "localhost";
	$dbUsername = "root";
	$dbPassword = "";

	$conn = new mysqli ($SERVERNAME ,$dbUsername ,$dbPassword);

	//checking the sql
	if($conn->connect_error){
		die("Some thing error <br>".$connect->connect_error);
	}

	$conn->select_db("DeliveryIt");


	$UserName = $_SESSION['username'];
	$GetUserQuery = "SELECT * from user WHERE Username='$UserName'";
	$result = $conn->query($GetUserQuery);
	$row = $result->fetch_assoc();
	if($Password!= $row['Password'] || $Name!= $row['Fullname'] || $email!= $row['Email'] || $PhoneNum!= $row['Phone']){
		$UpdateProfitQuery = "UPDATE user SET Password='$Password' , Fullname='$Name' ,Email='$email', Phone='$PhoneNum' WHERE Username='$UserName'";
		$conn->query($UpdateProfitQuery);
	}
	echo "<script>
	alert('Change Successfully');
	</script>";

	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>DeliveryIt</title>
	    <script type="text/javascript" src="JavaScript/script.js"></script>
    	<link rel= "stylesheet" href="CSS/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body class="text-black">
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
		<div class="body">
			<div class="container">
				<div class="header">
					<h1>Manage Profile</h1>
				</div>
				<div id="manageProfileForm">
					<form action="" method="Post" onsubmit="return Owner_Validate()" enctype="multipart/form-data">
						<div>
							<?php
								$conn = new mysqli ('localhost', 'root', '',"DeliveryIt");
								$UserName = $_SESSION['username'];
								$GetUserQuery = "SELECT * from User WHERE username='$UserName'";
								$result = $conn->query($GetUserQuery);
								$row = $result->fetch_assoc();
									echo'<div>
											<div class="form-group row">
													<label for="NewVolunteername">Username:</label>
													<input class="form-control" type="text" name="username" id="NewVolunteername" placeholder="Enter username" value="'.$row["Username"].'" disabled="true">
												</div>
												<div class="form-group row">
													<label for="NewVolunteerpassword">Password:</label>
													<input class="form-control" type="password" name="password" id="NewVolunteerpassword" placeholder="Enter password" value="'.$row["Password"].'" required>
												    <div class="custom-control">
													   	<input type="checkbox" id="showPassword" class="form-check-input" onclick="ManageProfitshowPassword()">
														<label class="form-check-label" for="showPassword">Show Password</label>
													</div>
												</div>
												<div class="form-group row">
													<label for="NewVolunteerFullname">Full name:</label>
													<input class="form-control" type="text" name="fullName" id="NewVolunteerFullname" placeholder="Enter real name" value="'.$row["Fullname"].'" required>
												</div>
												<div class="form-group row">
													<label for="NewVolunteerFullname">Email:</label>
													<input class="form-control" type="text" name="email" id="email" placeholder="Enter email" value="'.$row["Email"].'" required>
												</div>
												<div class="form-group row">
													<label for="NewVolunteerPhoneNumber">Phone:</label>
													<input class="form-control" type="text" name="phoneNumber" id="NewVolunteerPhoneNumber" placeholder="Enter phone number" value="'.$row["Phone"].'" required>
												</div>
											</div>'
											?>

						<div class="button form-row">
							<div class="col-xl-4 col-md-6 offset-xl-2">
								<input type="submit" class="btn btn-block btn-primary"  name="submit" value="Save Change">
							</div>
							<div class="col-xl-4 col-md-6">
								<input type="reset" class="btn btn-block btn-danger" name="reset" value="Reset">
							</div>
						</div>
					</form>
				</div>
				<div class="back row">
					<input type="button" class="btn btn-block col-4 offset-md-4" value="Back" onclick="document.location='UserPage.php'">
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>
