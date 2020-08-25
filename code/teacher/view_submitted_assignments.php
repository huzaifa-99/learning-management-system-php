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
			require('../dbconnection.php');
			require 'verify_user_logged_in.php';
			require 'display_user_profile_pic.php';
				//if(isset($_POST['viewassignment']))
				//{
			echo "<h1 class='margintop marginbottom'>Submitted Assignments</h1>";
			$sqlquery6 = "SELECT * FROM assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' AND Check_Date='' ORDER BY Assignment_No ASC";
					$resultsqlquery6 = mysqli_query($connect, $sqlquery6);
					if (mysqli_num_rows($resultsqlquery6)==0) {
						echo "<a href='view_submitted_assignments_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Excel</button></a>";
						echo "<script>alert('No Assignments Are Left to Be Checked');</script>";
					}
					elseif (mysqli_num_rows($resultsqlquery6)>0) {
						echo "<a href='view_submitted_assignments_excel.php'><button class='btn btn-success col col-xs-2 col-sm-2 col-md-2 col-lg-2'>Download Excel</button></a>";
						//echo "The Submitted Assignments Are as follows";
						$rowarray=[];
						echo "<br><br>";
						echo '<table class="table"><thead><tr><th scope="col">Student_Email</th><th scope="col">Assignment_No</th><th scope="col">Assignment_FileN</th><th scope="col">Download</th><th scope="col">View</th><th scope="col">Marks</th></tr></thead><tbody>';
						while($row=mysqli_fetch_array($resultsqlquery6))
						{
							$i=0;
							//$row["Id"]+=1;
							echo '<tr><th scope="row">'.$row["Student_Email"].'</th><td>'.$row["Assignment_No"].'</td><td>'.$row["Assignment_FileN"].'</td><td><a href="../download_assignments.php?id='.$row["Id"].'" class="btn btn-success col col-xs-10 col-sm-10 col-md-10 col-lg-10">Download</a></td><td><a href="view_assignments.php?id='.$row['Id'].'" class="btn btn-success col col-xs-10 col-sm-10 col-md-10 col-lg-10">View</a></td><td><form action="check_assignments.php" method="post"><input type="text" placeholder="Enter Marks" name="marks" class="col col-lg-5 col-xl-5 col-md-5 col-sm-5 form-control" style="float:left;" required><input type="hidden" name="email['.$row["Student_Email"].']" value="'.$row['Student_Email'].'"><input type="hidden" name="assignno['.$row["Assignment_No"].']" value="'.$row["Assignment_No"].'"><input type="submit" name="submit" value="Check" class="btn btn-success col col-xs-12 col-sm-12 col-md-5 col-lg-5"></form></td></tr>';

							//echo "Student -> ".$row['Student_Email']."|| Assignment No. -> ".$row['Assignment_No']."|| Name -> 	".$row['Assignment_FileN']."<a href='../download_assignments.php?id=".$row['Id']."'>Download</a>	<a href='view_assignments.php?id=".$row['Id']."'>View</a><form action='check_assignments.php' method='post'><input type='text' placeholder='Enter Marks' name='marks'><input type='hidden' name='email[".$row['Student_Email']."]' value='".$row['Student_Email']."'><input type='hidden' name='assignno[".$row['Assignment_No']."]' value='".$row['Assignment_No']."'><input type='submit' name='submit' value='Check'></form>";
					 
					        $i++;
						}
						echo '</tbody></table>';
					}
					else{
						echo "string";
					}
					if (isset($_GET['message'])) {
						$message =$_GET['message'];
						echo '<script>alert("'.$message.'");</script>';
					}
				//}
				//elseif (!isset($_POST['viewassignment'])) {
				//	header("location: check_upload_assignments.php?message=View Assignment Button Not Set");	
				//}
		?>
</center>
</body>
</html>