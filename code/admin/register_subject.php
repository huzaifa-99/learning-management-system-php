<!DOCTYPE html>
<html>
<head>
	<title>New User Registeration</title>
</head>
<body>
	<h1>New User Registeration</h1>
	<!--Get Registeration Credentials from the admin and send them to **************** page-->
	<form method="post" action="" enctype="multipart/form-data">
		<input type="text" name="Sname" id="Sname" placeholder="Subject_Name" required>
		<br>
		<input type="text" name="Smarks" id="Smarks" placeholder="Subjects_Marks" required>
		<br>
		<input type="submit" name="register" id="register" value="Register Subject">
	</form>
	<?php
		require_once('../dbconnection.php');
		require 'verify_user_logged_in.php';
		if (isset($_POST['Sname']) && $_POST['Sname']!=="") { $Sname=$_POST['Sname']; }
		if (isset($_POST['Smarks']) && $_POST['Smarks']!=="") { $Smarks=$_POST['Smarks']; }
		if (isset($_POST['register'])) {
			//   CHECK IF THE SUBJECT IS ALREADY REGISTERED
			$sqlquery7 = "SELECT * FROM subject_project2 WHERE S_Name='$Sname'";
			$resultsqlquery7 = mysqli_query($connect, $sqlquery7);
			// IF IT IS REGISTERED IN DATABASE THEN
			if (mysqli_num_rows($resultsqlquery7)>0) {
				echo "This Subject Is Already Registered";
			}
			// ELSE IF IT IS NOT REGISTERED THEN
			elseif (mysqli_num_rows($resultsqlquery7)==0) {
				// IF THE SUBJECT IS NOT REGISTERED THEN USE THIS QUERY
				$sqlquery8 = "INSERT INTO subject_project2 (S_Name,S_Marks) VALUES ('$Sname','$Smarks')";
				$resultsqlquery8 = mysqli_query($connect,$sqlquery8);
				// IF THE QUERY RUNS SUCCESSFULLY AND DATA IS INSERTED INTO TABLE
				if ($resultsqlquery8) {
					echo "Subject Registered Successfully";
				}
				// IF THE QUERY HAS ERROR
				elseif (!$resultsqlquery8) {
					echo "Could NOt Insert Data into DATABASE Table";
				}
			}
		}
	?>
</body>
</html>