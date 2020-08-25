<!DOCTYPE html>
<html>
<head>
	<title>Give Assignments</title>
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
	<h1 class="margintop marginbottom">Give Assignment/s</h1>
		<form action="give_assignments_php.php" method="post" enctype="multipart/form-data">
			<br>
			<input type="text" name="topic" id="topic" placeholder="Assignment Topic" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
			<br>


			<input type="text" name="deadline" id="deadline" placeholder="Deadline" onfocus="(this.type='date')" onblur="(this.type='text')" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>

			<!--<select name="deadline" id="deadline" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		        <option value="">Assignment Deadline</option>
		        <option value="1-Day">1 Day</option>
		        <option value="2-Days">2 Days</option>
		        <option value="3-Days">3 Days</option>
		        <option value="4-Days">4 Days</option>
		        <option value="5-Days">5 Days</option>
		        <option value="6-Days">6 Days</option>
		        <option value="7-Days">7 Days</option>
      		</select>-->


			<br>
			<input type="text" name="marks" id="marks" placeholder="Assignment Marks" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
			<br>

			<!--<input type="text" name="assignmentnumber" id="assignmentnumber" placeholder="Assignment No" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
			<br>-->

			<input type="Submit" name="giveassignment" class="height btn btn-primary col col-xs-12 col-sm-12 col-md-10 col-lg-10" value="Give Assignment">
		</form>
		<?php
			if(isset($_GET['message1']))
			{
				$message = $_GET['message1'];
				if(is_array($message)){print_r($message);}
				echo $message;
			}
		?>
	</center>	
</body>
</html>