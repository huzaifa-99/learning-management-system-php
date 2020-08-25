<!DOCTYPE html>
<html>
<head>
	<title>Course Assignments Teacher</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--External Css Link-->
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
	session_start();
	require 'verify_user_logged_in.php';
	require 'display_user_profile_pic.php';
	?>
	<center>
	<h1 class="margintop marginbottom">Course Assignments</h1>
		<a href="view_submitted_assignments.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">View Submitted Assignment</button></a>
		<br>
		<a href="give_assignments_form.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">Give Assignment</button></a>
		<br>
		<a href="view_given_assignments.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">View Given Assignments</button></a>
		<br>
		<?php
		if(isset($_GET['message2']))
		{
			$message = $_GET['message2'];
			if(is_array($message)){print_r($message);}
			echo $message;
		}?>
	</center>
</body>
</html>