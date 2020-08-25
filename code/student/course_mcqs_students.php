<!DOCTYPE html>
<html>
<head>
	<title>Mcq's</title>
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
    <h1 class="margintop marginbottom">MCQ's</h1>
    <a href="evaluate_mcqs_results.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">Evaluate Mcq's Result</button></a>
    <br>
    <a href="attempt_mcqs_quiz.php"><button class="height btn btn-primary col col-xs-12 col-sm-12 col-md-9 col-lg-11">Attempt Mcq's Quiz</button></a>
	<br>
    </center>
</body>
</html>