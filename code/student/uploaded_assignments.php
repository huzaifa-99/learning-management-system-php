<!DOCTYPE html>
<html>
<head>
	<title>View Uploaded Assignment</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--External Css Link-->
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<center>
	<h1 class="margintop">View Uploaded Assignment</h1>
	<?php
		session_start();
		require('../dbconnection.php');
		require 'verify_user_logged_in.php';
		require 'display_user_profile_pic.php';
		$sqlquery6 = "SELECT * FROM assignments_project2 WHERE Student_Email='{$_SESSION['Email']}' AND Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' ORDER BY Assignment_No ASC";
		$resultsqlquery6 = mysqli_query($connect, $sqlquery6);
		if (mysqli_num_rows($resultsqlquery6)==0) {
			echo "<script>alert('No assignment is submitted by you of this course');</script>";
		}
		elseif (mysqli_num_rows($resultsqlquery6)>0) {
			//echo "Your Uploaded Assignments Are as follows";
			//$rowarray=[];
			echo '<table class="table table-striped"><thead class="thead-dark"><tr><th scope="col">Assignment_No</th><th scope="col">File_Name</th><th scope="col">Upload_Date</th><th scope="col">Download Assignments</th></tr></thead><tbody>';
			while($row=mysqli_fetch_array($resultsqlquery6))
			{
						$i=0;
						//echo "<br>";
						//$row["Id"]+=1;
						echo '<tr><th scope="row">'.$row['Assignment_No'].'</th><td>'.$row['Assignment_FileN'].'</td><td>'.$row['Upload_Date'].'</td><td><a href="../download_assignments.php?id='.$row["Id"].'"><button class="btn btn-success">Download</button></a></td></tr>';


						//echo "Assignment no -> ".$row['Assignment_No']."  || Name -> ".$row['Assignment_FileN']."<a href='../download_assignments.php?id=".$row['Id']."'>Download</a>";

						//echo "Assignment no -> ".$row['Assignment_No']."  || Name -> ".$row['Assignment_FileN']."<a href='../download_assignments.php?id=".$row['Id']."'>Download</a>";
						//$rowarray[$i]=['<form action="download_assignments.php" method="post">'] 
				        //$rowarray[$i]=[$row['Assignment_No'].':     '.$row['Assignment_FileN'].'<a href="download_assignments.php?id= 25">Download</a>'];
				        echo"<br>";
				        //print_r($rowarray[$i]);
				        $i++;
				        //echo "<a href='index.pj?id=8'>fyfy</a>";
			}
			echo '</tbody></table>';
			//header("location: course_assignments_students.php?message=$rowarray");

		}
		else
		{
			echo "Unknow Error In Else statement";
		}				
?>
</center>	
</body>
</html>
		

		
		