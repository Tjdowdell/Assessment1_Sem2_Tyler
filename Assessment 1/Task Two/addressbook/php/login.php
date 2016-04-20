<?php
session_start();
$message = "<p></p>";
$username = $password = "";

if ($_POST){
	$username = test_input($_POST['username']);
	$password = md5($_POST['password']);

include('connect.php');

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)==1){
	
	$_SESSION['loggedin'] = 'true';
	header('location:../index.php');
} else {
	echo $message = "<p>Wrong Username or Password</p>";
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
    <title>Login or Register</title>
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
   
    <header>
    	<h1>Login to Your Address Book</h1>
    </header>
    <div class="row"> 
        <div class="col-xs-12">
        	<article class="inner-main-content">
				<?php
					if(!isset($_SESSION['loggedin'])){ 	
				echo "<form role='role' method='POST'>
                <div class='row'>
                  <div class='col-lg-7 col-md-7 col-sm-11 col-xs-11'>
                    <div class='input-group'>
                      <span class='input-group-addon' id='basic-addon1'>Username</span>
                      <input type='text' class='form-control' placeholder='Enter Username' aria-describedby='basic-addon1' name='username'>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <br><br>
                  <div class='col-lg-7 col-md-7 col-sm-11 col-xs-11'>
                    <div class='input-group'>
                      <span class='input-group-addon' id='basic-addon2'>Password</span>
                      <input type='password' class='form-control' placeholder='Enter Password' aria-describedby='basic-addon2' name='password'>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <br><br>
                  </div>
				  <button type='submit' class='btn btn-success'>Login</button>
				  </form>";
				  }
					?>
				  
            </article>
        </div>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.2.1.min"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>