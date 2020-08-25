<!DOCTYPE html>
<html>
<head>
	<title>Upload MCQ's</title>
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
	<h1 class="margintop marginbottom">Upload MCQ's</h1>
	<form action="upload_mcqs_php.php" method="post">
		<br>
		<input type="text" name="question" id="question" placeholder="Enter Question" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="text" name="option1" id="option1" placeholder="Option 1" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="text" name="option2" id="option2" placeholder="Option 2" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="text" name="option3" id="option3" placeholder="Option 3" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="text" name="option4" id="option4" placeholder="Option 4" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="number" name="answer" id="answer" min="1" max="4" placeholder="Correct Option" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="submit" name="uploadquestion" class="height btn btn-primary col col-xs-12 col-sm-12 col-md-10 col-lg-10" value="Upload Question">
	</form>
	</center>
</body>
</html>