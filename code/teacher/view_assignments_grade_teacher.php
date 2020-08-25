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
			echo "<h1 class='margintop marginbottom'>Assignments Grades</h1>";
			$sqlquery19 = "SELECT * FROM assignments_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' AND Marks!='' ORDER BY Assignment_No ASC";
			$resultsqlquery19 = mysqli_query($connect,$sqlquery19);
			if (mysqli_num_rows($resultsqlquery19)==0) {
				echo "You Have Not Assigned Any Grades Yet";
			}	
			elseif (mysqli_num_rows($resultsqlquery19)>0) {
				echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">Assignment No</th><th scope="col">Student_ID</th><th scope="col">Student_Email</th><th scope="col">Marks</th><th scope="col">Upload_Date</th><th scope="col">Check_Date</th><th scope="col">Download</th><th scope="col">View</th></tr></thead><tbody>';
				while ($row=mysqli_fetch_assoc($resultsqlquery19)) {
					echo '<tr><th scope="row">'.$row["Assignment_No"].'</th><td>'.$row["Student_ID"].'</td><td>'.$row["Student_Email"].'</td><td>'.$row["Marks"].'</td><td>'.$row["Upload_Date"].'</td><td>'.$row["Check_Date"].'<td><a href="../download_assignments.php?id='.$row["Id"].'" class="btn btn-success col col-xs-10 col-sm-10 col-md-10 col-lg-10">Download</a></td><td><a href="view_assignments.php?id='.$row['Id'].'" class="btn btn-success col col-xs-10 col-sm-10 col-md-10 col-lg-10">View</a></td></tr>';
					//echo "Assignment_No -> ".$row["Assignment_No"]."  ||  Student_ID -> ".$row["Student_ID"]."  ||  Marks -> ".$row["Marks"]."<br>";
				}
				echo "</tbody></table>";
				echo "<a href='view_assignments_grade_teacher_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Excel</button></a>";
			}	
		?>
	</center>
</body>
</html>