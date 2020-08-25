<!DOCTYPE html>
<html>
<head>
	<title>Course Grade Teacher</title>
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
	<h1 class="margintop marginbottom">Grades</h1>
	<a href="view_assignments_grade_teacher.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">View Assignments Grade</button></a>
	<br>
	<a href="view_mcqs_grade_teacher.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">View Mcq's Grade</button></a>
	<br>
	</center>
</body>
</html>