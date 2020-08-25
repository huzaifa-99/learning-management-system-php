<!DOCTYPE html>
<html>
<head>
	<title>View Assignments Grade</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--External Css Link-->
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<center>
		<?php
			session_start();
			require_once('../dbconnection.php');
			require 'verify_user_logged_in.php';
			require 'display_user_profile_pic.php';
			echo "<h1 class='margintop marginbottom'>View Assignments Grade</h1>";
			$sqlquery17 = "SELECT * FROM assignments_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' AND Student_ID='{$_SESSION['Id']}' AND Marks!='' ORDER BY Assignment_No ASC";
			$resultsqlquery17 = mysqli_query($connect,$sqlquery17);
			if (mysqli_num_rows($resultsqlquery17)==0) {
				echo "You Have Not Submitted Any Assignment Yet";
			}	
			elseif (mysqli_num_rows($resultsqlquery17)>0) {
				echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">Assignment_No</th><th scope="col">Submittion Date</th><th scope="col">Marks</th></tr></thead><tbody>';
				while ($row=mysqli_fetch_assoc($resultsqlquery17)) {
					echo '<tr><th scope="row">'.$row["Assignment_No"].'</th><td>'.$row["Upload_Date"].'</td><td>'.$row["Marks"].'</td></tr>';
					//echo "Assignment_No -> ".$row["Assignment_No"]."  ||  Marks -> ".$row["Marks"]."<br>";
				}
			}	
		?>
	</center>
</body>
</html>