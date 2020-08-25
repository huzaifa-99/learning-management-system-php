<!DOCTYPE html>
<html>
<head>
	<title>Upload MCQ'S</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--External Css Link-->
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<center>
		<?php
			session_start();
			require_once("../dbconnection.php");
			require 'verify_user_logged_in.php';
			require 'display_user_profile_pic.php';
			echo "<h1 class='margintop marginbottom'>Submitted MCQ's By Students</h1>";
			$sqlquery14 = "SELECT * FROM answerpapers_projects2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' ORDER BY U_Id ASC";
			$resultquery14 = mysqli_query($connect,$sqlquery14);
			if (mysqli_num_rows($resultquery14)==0) {
				echo "<script>alert('No Mcq's Are Submitted Of This Course');</script>";
			}
			elseif (mysqli_num_rows($resultquery14)>0) {
				//echo "Uploaded Mcq's Are As Follows<br>";
				echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">U_Id</th><th scope="col">Q_Id</th><th scope="col">A_Id</th><th scope="col">Chosen_Answer</th><th scope="col">Actual_Answer</th><th scope="col">Result</th></tr></thead><tbody>';
				while ($row=mysqli_fetch_assoc($resultquery14)) {
					echo '<tr><th scope="row">'.$row["U_Id"].'</th><td>'.$row["Q_Id"].'</td><td>'.$row["A_Id"].'</td><td>'.$row["Chosen_Answer"].'</td><td>'.$row["Actual_Answer"].'</td><td>'.$row["Result"].'</td></tr>';
					//echo "Student -> ".$row['U_Id']."|| Question No. -> ".$row['Q_Id']."|| Chosen_Answer -> 	".$row['Chosen_Answer']."|| Actual_Answer -> 	".$row['Actual_Answer']."|| Result -> 	".$row['Result']."<br>";
				}
				echo "</tbody></table><a href='view_submitted_mcqs_excel.php'><button class='btn btn-success col col-xs-3 col-sm-3 col-md-3 col-lg-3'>Download Excel</button></a>";
			}
		?>
	</center>
</body>
</html>