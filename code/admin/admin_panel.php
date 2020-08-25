<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	  <!--Bootstrap Link-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <!--External Css Link-->
	  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
	require 'verify_user_logged_in.php';
	?>
	<center>
	<h1 class='margintop marginbottom'>Admin Panel</h1>
	<a href="register_user.php"><button class="height btn btn-success col col-xs-12 col-sm-12 col-md-10 col-lg-10">Register A New User</button></a>
	<br>
	<a href="delete_user.php"><button class="height btn btn-success col col-xs-12 col-sm-12 col-md-10 col-lg-10">Delete A User Account</button></a>
	<br>
	<!--<a href="register_subject.php">Register A Subject</a>
	<br>-->
	<a href="../logout.php"><button class="height btn btn-success col col-xs-12 col-sm-12 col-md-10 col-lg-10">Logout</button></a>
	</center>
</body>
</html>

