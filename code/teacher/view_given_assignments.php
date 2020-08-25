<!DOCTYPE html>
<html>
<head>
	<title>Course Assignments Teacher</title>
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
			echo "<h1 class='margintop marginbottom'>Given Assignments</h1>";
			$sqlquery14 = "SELECT * FROM given_assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}'";
			$resultsqlquery14 = mysqli_query($connect,$sqlquery14);
			if (mysqli_num_rows($resultsqlquery14)==0) {
				echo "<script>alert('You Have Not Assigned Any Assignment Yet');</script>";
			}
			elseif (mysqli_num_rows($resultsqlquery14)>0) {
				//echo "<a href='view_submitted_assignments_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Excel</button></a>";
				
				echo '<table class="table"><thead><tr><th scope="col">Assignment No</th><th scope="col">Topic</th><th scope="col">Marks</th><th scope="col">Date Given</th><th scope="col">Deadline</th><th scope="col">Download Submission List</th></tr></thead><tbody>';
				//echo "You Have Given The Following Assignment";
				while ($row=mysqli_fetch_assoc($resultsqlquery14)) {
					$timestamp = $row['Dategiven'];
					$datetime = explode(" ",$timestamp);
					$date = $datetime[0];
					echo '<tr><th scope="row">'.$row["Assign_No"].'</th><td>'.$row["Assign_Topic"].'</td><td>'.$row["Assign_Marks"].'</td><td>'.$date.'</td><td>'.$row["Deadline"].'</td><td><a href="view_given_assignments_excel_list.php?id='.$row["Assign_No"].'"><button class="btn btn-success col col-xs-5 col-sm-5 col-md-5 col-lg-5">Download list</button></a></td></tr>';
					//echo "<br>Assignment no -> ".$row["Assign_No"]." || Assignment Topic -> ".$row["Assign_Topic"]." || Assignment Marks -> ".$row["Assign_Marks"]." || Assignment Given On - > ".$row["Dategiven"]." **** With a deadline on -> ".$row["Deadline"];
				}
				echo '</tbody></table>';
				echo "<a href='view_given_assignments_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Table</button></a>";
				//echo '<a href="view_given_assignments_excel.php"><button class="btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2">Download Excel</button></a>';
			}
		?>
	</center>
</body>
</html>

 