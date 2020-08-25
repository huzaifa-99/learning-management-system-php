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
	<center>
		<?php
			session_start();
			require_once('../dbconnection.php');
			require 'verify_user_logged_in.php';
			require 'display_user_profile_pic.php';
			echo "<h1 class='margintop marginbottom'>MCQ's Grades</h1>";
			$sqlquery20 = "SELECT * FROM answerpapers_projects2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' ORDER BY U_Id ASC";
			$resultsqlquery20=mysqli_query($connect,$sqlquery20);
			if (mysqli_num_rows($resultsqlquery20)==0) {
				echo "You Have Not Attempted Any Quiz Yet";
			}
			elseif (mysqli_num_rows($resultsqlquery20)>0) {
				echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">U_Id</th><th scope="col">Q_Id</th><th scope="col">A_Id</th><th scope="col">Chosen_Answer</th><th scope="col">Actual_Answer</th><th scope="col">Result</th></tr></thead><tbody>';
				while ($row=mysqli_fetch_assoc($resultsqlquery20)) {
					echo '<tr><th scope="row">'.$row["U_Id"].'</th><td>'.$row["Q_Id"].'</td><td>'.$row["A_Id"].'</td><td>'.$row["Chosen_Answer"].'</td><td>'.$row["Actual_Answer"].'</td><td>'.$row["Result"].'</td></tr>';
					//echo "U_Id ->".$row["U_Id"]."  || Q_Id ->".$row["Q_Id"]."  ||  A_Id ->".$row["A_Id"]."  ||  Chosen_Answer ->".$row["Chosen_Answer"]."  ||  Actual_Answer ->".$row["Actual_Answer"]."  ||  Result ->".$row["Result"]."<br>";
				}
				echo "</tbody></table>";
				echo "<a href='view_mcqs_grade_teacher_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Excel</button></a>";
			}
		?>
	</center>
</body>
</html>