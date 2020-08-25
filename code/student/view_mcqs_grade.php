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
		echo "<h1 class='margintop marginbottom'>View MCQ's Grade</h1>";
		$sqlquery18 = "SELECT * FROM answerpapers_projects2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' AND U_Id='{$_SESSION['Id']}'";
		$resultsqlquery18=mysqli_query($connect,$sqlquery18);
		if (mysqli_num_rows($resultsqlquery18)==0) {
			echo "You Have Not Attempted Any Quiz Yet";
		}
		elseif (mysqli_num_rows($resultsqlquery18)>0) {
			//echo "<h1>MCQ's Grade</h1>";
			echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">Q_Id</th><th scope="col">A_Id</th><th scope="col">Chosen_Answer</th><th scope="col">Actual_Answer</th><th scope="col">Result</th></tr></thead><tbody>';
			while ($row=mysqli_fetch_assoc($resultsqlquery18)) {
				echo '<tr><th scope="row">'.$row["Q_Id"].'</th><td>'.$row["A_Id"].'</th><td>'.$row["Chosen_Answer"].'</th><td>'.$row["Actual_Answer"].'</th><td>'.$row["Result"].'</th></tr>';
				//echo "Q_Id ->".$row["Q_Id"]."  ||  A_Id ->".$row["A_Id"]."  ||  Chosen_Answer ->".$row["Chosen_Answer"]."  ||  Actual_Answer ->".$row["Actual_Answer"]."  ||  Result ->".$row["Result"]."<br>";
			}
		}
	?>
</center>
</body>
</html>