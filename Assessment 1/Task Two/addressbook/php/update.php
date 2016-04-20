<?php

session_start();
$success = '';
include('connect.php');

if ($_GET) {
$contactid = $_GET['contactid'];
$query = "SELECT * FROM `contacts` WHERE `Contact_ID` = '$contactid'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
}
if ($_POST) {
	$firstname = $lastname = $mobile = $email = $address = $facebook = "";
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$facebook = $_POST['facebook'];
	$contactid = $_POST['contactid'];
	
	$query = "UPDATE `addressbook`.`contacts` SET `First_Name` = '$firstname', `Last_Name` = '$lastname', `Mobile` = '$mobile', `Email` = '$email', `Address` = '$address', `Facebook` = '$facebook' WHERE `contacts`.`Contact_ID` = '$contactid'; ";
$result = mysqli_query($con, $query);

if ($result) {

	$_SESSION['success'] = "You have updated " . $firstname . " " . $lastname . " in your address book!";
	header('location:../index.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Update Contact</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" type="text/css">

<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="wrapper">
   <div class="row">
	<a href="login.php" class="btn btn-success">Login</a> 
	<a href="../index.php" class="btn btn-success">Home</a>
	<a href="logout.php" class="btn btn-default login-btn hidden-xs">Logout</a>
	<a href="add_contact.php" class="btn btn-success">Add Contact</a>
	</div>
    <header>
    	<h1>Update a Mate in Your Address Book</h1>
    </header>
	</div>
<div class="row">
	<div class="col-sm-1">
	</div>
    <div class="row"> 
        <div class="col-sm-5">
        	<article class="inner-main-content">
            	
				
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
				  <form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Firstname</span>
                      <input type="text" class="form-control" value="<?php echo $row['First_Name']; ?>" aria-describedby="basic-addon1" name="firstname" >
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">Lastname</span>
                      <input type="text" class="form-control" value="<?php echo $row['Last_Name']; ?>" aria-describedby="basic-addon2" name="lastname">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">Mobile Number</span>
                      <input type="text" class="form-control" value="<?php echo $row['Mobile']; ?>" aria-describedby="basic-addon3" name="mobile">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon4">Email</span>
                      <input type="text" class="form-control" value="<?php echo $row['Email']; ?>" aria-describedby="basic-addon4" name="email">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon5">Address</span>
                      <input type="text" class="form-control" value="<?php echo $row['Address']; ?>" aria-describedby="basic-addon5" name="address">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon6">Facebook</span>
                      <input type="text" class="form-control" value="<?php echo $row['Facebook']; ?>" aria-describedby="basic-addon6" name="facebook">
                    </div>
					 <input type="hidden"  value="<?php echo $row['Contact_ID']; ?>" aria-describedby="basic-addon6" name="contactid">
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <br>
                    <button type="submit" class="btn btn-success">Update Contact</button>
					</form>
					<?php echo "$success"; ?>
                  </div>
                  <br><br>
                  </div>      
            </article>
			</div>
 </div>
        </div>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.2.1.min"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>