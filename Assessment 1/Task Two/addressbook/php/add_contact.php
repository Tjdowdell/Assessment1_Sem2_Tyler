<?php

session_start();
	if(!isset($_SESSION['loggedin'])) {
		header('location:php/login.php');
	}
$success = "";
$nameErr = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$firstname = $lastname = $mobile = $email = $address = $facebook = "";
	if (empty($_POST["firstname"])) {
		$nameErr = "Name&nbsp;is&nbsp;Required";
		$error = true;
	} else {
		$firstname = test_input($_POST["firstname"]);
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
				$nameErr = "Only&nbsp;Letters&nbsp;are&nbsp;allowed";
				$error = true;
			}			
	}	
	$lastname = $_POST['lastname'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$facebook = $_POST['facebook'];
	
if (!$error){
include('connect.php');
$query = "INSERT INTO `addressbook`.`contacts` (`Contact_ID`, `First_Name`, `Last_Name`, `Mobile`, 
`Email`, `Address`, `Facebook`) VALUES (NULL, '$firstname', '$lastname', '$mobile', '$email', 
'$address', '$facebook');";

$result = mysqli_query($con, $query);

if ($result) {
	$success = "You have added " . $firstname . " " . $lastname . " to your address book!";
}
}
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Contact</title>

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
	<a href="../index.php" class="btn btn-success">Home</a>
	<a href="logout.php" class="btn btn-danger login-btn hidden-xs">Logout</a>
	</div>
    <header>
    	<h1>Add a Mate to Your Address Book</h1>
    </header>
	</div>
<div class="row">
	<div class="col-sm-1">
	</div>
    <div class="row"> 
        <div class="col-sm-5">
        	<article class="inner-main-content">
            	
				<h2><?php echo $success; ?></h2>
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
				  <form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Firstname</span>
                      <input type="text" class="form-control" placeholder=<?php if(!$error){echo "Firstname";} else {echo $nameErr;} ?> aria-describedby="basic-addon1" name="firstname">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">Lastname</span>
                      <input type="text" class="form-control" placeholder="Lastname" aria-describedby="basic-addon2" name="lastname">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">Mobile Number</span>
                      <input type="text" class="form-control" placeholder="Mobile Number" aria-describedby="basic-addon3" name="mobile">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon4">Email</span>
                      <input type="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon4" name="email">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon5">Address</span>
                      <input type="text" class="form-control" placeholder="Address" aria-describedby="basic-addon5" name="address">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon6">Facebook</span>
                      <input type="text" class="form-control" placeholder="Facebook" aria-describedby="basic-addon6" name="facebook">
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                    <br>
                    <button type="submit" class="btn btn-success">Add Contact</button>
					<form>
                  </div>
                  <br><br>
                  </div>      
            </article>
			</div>
 </div>
        </div>
</div>
<div class="row">

</div>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.2.1.min"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>