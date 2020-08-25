<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--External Css Link-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	require 'verify_user_logged_in.php';
	require 'display_user_profile_pic.php';
	?>
	<center>
	<u><h1 class="margintop">Services Panel</h1></u>
	<a href="course_assignments.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">Course Assignments</button></a>
	<a href="grades.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">Grades</button></a>
	<a href="mcq_s.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">MCQ's</button></a>
	</center>
</body>
</html>