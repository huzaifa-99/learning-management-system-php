<!DOCTYPE html>
<html>
<head>
	<title>Submit Assignments</title>
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
echo "<h1 class='margintop marginbottom'>Submitted Assignment/s</h1>";
$sqlquery15 = "SELECT * FROM given_assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' ORDER BY Assign_No ASC";
$resultsqlquery15 = mysqli_query($connect,$sqlquery15);
if (mysqli_num_rows($resultsqlquery15)==0) {
	echo "No Assignments Are Given";
}
elseif (mysqli_num_rows($resultsqlquery15)>0){
	//echo "<h1>Submit Assignment/s</h1>";

	$sqlquery16 = "SELECT * FROM assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' AND Student_ID='{$_SESSION['Id']}' ORDER BY Assignment_No ASC";
	$resultsqlquery16=mysqli_query($connect,$sqlquery16);
	echo '<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Assignment_No</th>
      <th scope="col">Assign_Topic</th>
      <th scope="col">Assign_Marks</th>
      <th scope="col">Dategiven</th>
      <th scope="col">Deadline</th>
    </tr>
    </thead>
  <tbody>';
  $count=1;
  //echo date('Y-m-d',strtotime("+1 days")); add no of days to current date
  // for removing date and time from timestamp
  		//$timestamp = $row['Dategiven'];
		//$datetime = explode(" ",$timestamp);
		//$date = $datetime[0];
		//$time = $datetime[1];
		//echo $date;

		//$Date = "2010-09-17";
		//date('Y-m-d', strtotime($Date. ' + 2 days'));
	while ($row=mysqli_fetch_assoc($resultsqlquery15)) {
		
			$row1=mysqli_fetch_assoc($resultsqlquery16);
				if($row1)
				{	
					if($row["Assign_No"]==$row1["Assignment_No"]){ echo '<tr><th scope="col">'.$row1["Assignment_No"].'</th>
      <td>'.$row["Assign_Topic"].'</td>
      <td>'.$row["Assign_Marks"].'</td>
      <td>'.$row["Dategiven"].'</td>
      <td>'.$row["Deadline"].'</td>
    </tr>
';}
					elseif($row["Assign_No"]!==$row1["Assignment_No"]){$assignnumber= $row["Assign_No"];

					$x=date('Y-m-d');  // get current date
					$timestamp = $row['Dategiven']; // get timestamp date from database
					$datetime = explode(" ",$timestamp);  // explode timesatmp date into date and time
					$date = $datetime[0]; // seperate date from timestamp
					$deadline = $row["Deadline"]; // get assignment deadline from db 
					$match = date('Y-m-d', strtotime($date. ' + '.$deadline[0].' days')); // add deadline days to timestamp date
					// if datetoday is less than the deadline yani abhi submittion deadline aany mai time hai
					if($x<$match){
						if($count==1){echo "<h1 class='margintop marginbottom'>To Submit</h1>";}// top print once in while loop
						$count++;
						//$row["Assign_No"]//$row["Assign_Topic"]//$row["Assign_Marks"]//$row["Dategiven"]//$row["Deadline"]
						echo '<form action="upload_assignments.php" method="post" enctype="multipart/form-data">';
						echo "Assignment No - > ".$assignnumber." || Topic -> ".$row["Assign_Topic"]." || Marks -> ".$row["Assign_Marks"]." || Given On -> ".$row["Dategiven"]." || Deadline -> ".$row["Deadline"];
						echo '<input type="file" name="uploadassignment" required>';
						echo '<input type="hidden" name="assignmentnumber['.$assignnumber.']" value="'.$assignnumber.'" required>';
						echo '<input type="submit" name="submitassignment" value="Submit Assignment"></form>';echo "string";
						}
					}
				}
				elseif(!$row1)
				{	echo "</tbody></table>";
					$x=date('Y-m-d');  // get current date
					$timestamp = $row['Dategiven']; // get timestamp date from db
					$datetime = explode(" ",$timestamp);  // explode timesatmp into date and time
					$date = $datetime[0]; // seperate date from timestamp
					$deadline = $row["Deadline"]; // get assignment deadline from db
					$match = date('Y-m-d', strtotime($date. ' + '.$deadline[0].' days')); // add deadline days to timestamp days
					// if datetoday is less than deadline then
					if($x<$match){
					if($count==1){echo "<h1 class='margintop marginbottom'>To Submit</h1>";}//to print once in while loop
					$count++;
					echo '<table class="table table-striped"><thead><tr><th scope="col">Assignment_No</th><th scope="col">Assign_Topic</th><th scope="col">Assign_Marks</th><th scope="col">Dategiven</th><th scope="col">Deadline</th><th scope="col">ChosePdf</th></tr></thead><tbody>';
					
					{$assignnumber= $row["Assign_No"];
					//$row["Assign_No"]//$row["Assign_Topic"]//$row["Assign_Marks"]//$row["Dategiven"]//$row["Deadline"]

					echo '<form action="upload_assignments.php" method="post" enctype="multipart/form-data">';
					echo '<tr><th scope="col">'.$row["Assign_No"].'</th>
					      <td>'.$row["Assign_Topic"].'</td>
					      <td>'.$row["Assign_Marks"].'</td>
					      <td>'.$row["Dategiven"].'</td>
					      <td>'.$row["Deadline"].'</td>
					      <td><input type="file" name="uploadassignment" class="btn btn-secondary col col-xs-12 col-sm-12 col-md-12 col-lg-12" required></td>
					      <td><input type="hidden" name="assignmentnumber['.$assignnumber.']" value="'.$assignnumber.'" required></td>
					      <td><input type="submit" name="submitassignment" class="btn btn-primary col col-xs-12 col-sm-12 col-md-12 col-lg-12" value="Submit Assignment"></td>
					    </tr>
					';
					//echo '<input type="file" name="uploadassignment" required>';
					//echo '<input type="hidden" name="assignmentnumber['.$assignnumber.']" value="'.$assignnumber.'" required>';
					//echo '<input type="submit" name="submitassignment" value="Submit Assignment"></form>';
					echo "</form>";
					}
				}
				}
				
		}
		if(isset($_GET['message']))
		{
			$message=$_GET['message'];
			if($message="Unsupported File Format.Only Pdf are accepted")
			{
				echo "<script>alert('Unsupported File Format.Only Pdf are accepted');</script>";
			}
			
		}
		/*$row1=mysqli_fetch_assoc($resultsqlquery16);
		if($row1)
		{
		if($row["Assign_No"]==$row1["Assignment_No"]){}
			else{$assignnumber= $row["Assign_No"];
					echo "<h1>Submit Assignment/s</h1>";
					//$row["Assign_No"]//$row["Assign_Topic"]//$row["Assign_Marks"]//$row["Dategiven"]//$row["Deadline"]
					echo '<form action="upload_assignments.php" method="post" enctype="multipart/form-data">';
					echo "Assignment No - > ".$assignnumber." || Topic -> ".$row["Assign_Topic"]." || Marks -> ".$row["Assign_Marks"]." || Given On -> ".$row["Dategiven"]." || Deadline -> ".$row["Deadline"];
					echo '<input type="file" name="uploadassignment" required>';
					echo '<input type="hidden" name="assignmentnumber['.$assignnumber.']" value="'.$assignnumber.'" required>';
					echo '<input type="submit" name="submitassignment" value="Submit Assignment"></form>';}
		}
		else{	
					//if($row["Assign_No"]==$row1["Assignment_No"]){}	
					$assignnumber= $row["Assign_No"];
					//$row["Assign_No"]//$row["Assign_Topic"]//$row["Assign_Marks"]//$row["Dategiven"]//$row["Deadline"]
					echo '<form action="upload_assignments.php" method="post" enctype="multipart/form-data">';
					echo "Assignment No - > ".$assignnumber." || Topic -> ".$row["Assign_Topic"]." || Marks -> ".$row["Assign_Marks"]." || Given On -> ".$row["Dategiven"]." || Deadline -> ".$row["Deadline"];
					echo '<input type="file" name="uploadassignment" required>';
					echo '<input type="hidden" name="assignmentnumber['.$assignnumber.']" value="'.$assignnumber.'" required>';
					echo '<input type="submit" name="submitassignment" value="Submit Assignment"></form>';}

		}*/
			//
			//while ($row=mysqli_fetch_assoc($resultsqlquery15)) {
					
			//}
}
					
?>
</center>
</body>
</html>