<?php
	session_start();
	
	if(!isset($_SESSION['loggedin'])) {
		header('location:php/login.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Address Book</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<link href="css/mystyle.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="wrapper">
  <div class="container">
  	<div class="row">
	<a href="php/add_contact.php" class="btn btn-success">Add New Contact</a>
	<a href="php/logout.php" class="btn btn-danger login-btn hidden-xs">Logout</a>
	</div>
	</div>
    <header>
	<h1>Welcome To Your Address Book</h1>
    </header>
	<?php
	if (isset($_SESSION['success'])) {
		echo $_SESSION['success'];
		}
	if (isset($_SESSSION['deletecontact'])) { 
	echo 'test';
		echo $_SESSSION['deletecontact'];
	}
	?>
    <div class="container">
<div class="row">
	<div class="col-sm-1">
	</div>
	<div class="col-sm-5">
	
	<?php 
	if ($_GET){
	$lastinitial = $_GET['lastinitial'];
	
	include('php/connect.php');
				
	$query = "SELECT * FROM `contacts` WHERE `Last_Name` LIKE '$lastinitial%' ORDER BY `Last_Name` ASC";
	
				
	$result = mysqli_query($con, $query);
				
	
			
	while ($row = mysqli_fetch_assoc($result)) {						
					echo "<article class='well'>";
								echo "<h2>First Name: <small>" . $row['First_Name'] . "</small></h2>";
								echo "<h2>Last Name: <small>" . $row['Last_Name'] . "</small></h2>";
								echo "<h2>Mobile: <small>" . $row['Mobile'] . "</small></h2>";
								echo "<h2>Email: <small>" . $row['Email']  . "</small></h2>";
								echo "<h2>Address: <small>" . $row['Address'] . "</small></h2>";
								echo "<h2>Facebook:</h2> <a href='www.facebook.com/'" . $row['Facebook'] . "target='_blank'>Go to Facebook Profile</a>";
								echo "<br> <br>";
								echo "<p class='btn btn-success'><a href='php/update.php?contactid=" . $row['Contact_ID'] . "'>Edit Contact</a></p>";
								echo "<br> <br>";
								echo "<p class='btn btn-warning'><a href='php/delete.php?contactid=" . $row['Contact_ID'] . "&contactfname=" . $row['First_Name'] . "'>Delete Contact</a></p>";
					echo "</article>";
		}
	}
	
	?>
	
	</div>
	<div class="col-sm-2">
	<ul class="list-group">
		<a href="index.php?lastinitial=a"><li class="list-group-item list-group-item-success text-center">A</li></a>
		<a href="index.php?lastinitial=b"><li class="list-group-item list-group-item-warning text-center">B</li></a>
		<a href="index.php?lastinitial=c"><li class="list-group-item list-group-item-success text-center">C</li></a>
		<a href="index.php?lastinitial=d"><li class="list-group-item list-group-item-warning text-center">D</li></a>
		<a href="index.php?lastinitial=e"><li class="list-group-item list-group-item-success text-center">E</li></a>
		<a href="index.php?lastinitial=f"><li class="list-group-item list-group-item-warning text-center">F</li></a>
		<a href="index.php?lastinitial=g"><li class="list-group-item list-group-item-success text-center">G</li></a>
		<a href="index.php?lastinitial=h"><li class="list-group-item list-group-item-warning text-center">H</li></a>
		<a href="index.php?lastinitial=i"><li class="list-group-item list-group-item-success text-center">I</li></a>
		<a href="index.php?lastinitial=j"><li class="list-group-item list-group-item-warning text-center">J</li></a>
		<a href="index.php?lastinitial=k"><li class="list-group-item list-group-item-success text-center">K</li></a>
		<a href="index.php?lastinitial=l"><li class="list-group-item list-group-item-warning text-center">L</li></a>
		<a href="index.php?lastinitial=m"><li class="list-group-item list-group-item-success text-center">M</li></a>
		</ul>
		</div>
		<div class="col-sm-2">
	<ul class="list-group">
		<a href="index.php?lastinitial=n"><li class="list-group-item list-group-item-warning text-center">N</li></a>
		<a href="index.php?lastinitial=o"><li class="list-group-item list-group-item-success text-center">O</li></a>
		<a href="index.php?lastinitial=p"><li class="list-group-item list-group-item-warning text-center">P</li></a>
		<a href="index.php?lastinitial=q"><li class="list-group-item list-group-item-success text-center">Q</li></a>
		<a href="index.php?lastinitial=r"><li class="list-group-item list-group-item-warning text-center">R</li></a>
		<a href="index.php?lastinitial=s"><li class="list-group-item list-group-item-success text-center">S</li></a>
		<a href="index.php?lastinitial=t"><li class="list-group-item list-group-item-warning text-center">T</li></a>
		<a href="index.php?lastinitial=u"><li class="list-group-item list-group-item-success text-center">U</li></a>
		<a href="index.php?lastinitial=v"><li class="list-group-item list-group-item-warning text-center">V</li></a>
		<a href="index.php?lastinitial=w"><li class="list-group-item list-group-item-success text-center">W</li></a>
		<a href="index.php?lastinitial=x"><li class="list-group-item list-group-item-warning text-center">X</li></a>
		<a href="index.php?lastinitial=y"><li class="list-group-item list-group-item-success text-center">Y</li></a>
		<a href="index.php?lastinitial=z"><li class="list-group-item list-group-item-warning text-center">Z</li></a>
	</ul>
</div>
 </div>
 </div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.1.min"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>