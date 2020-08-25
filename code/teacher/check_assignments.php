<?php
session_start();
require_once('../dbconnection.php');
require 'verify_user_logged_in.php';
//print_r($_POST['email']);
//print_r($_POST['assignno']);
$valuefrompost1="";
$valuefrompost2="";
	foreach ($_POST['email'] as $key => $value) {
		//echo "string";
		$valuefrompost1=$value;
	}
	foreach ($_POST['assignno'] as $key => $value) {
		//echo "string";
		$valuefrompost2=$value;
	}
	if (!isset($valuefrompost1)) {
		echo "NOT SET $valuefrompost1";
	}
	if (!isset($valuefrompost2)) {
		echo "NOT SET $valuefrompost2";
	}
	if(isset($_POST['marks']) && $_POST['marks']!==""){
		$marks=$_POST['marks'];
	}
	elseif(!isset($_POST['marks'])){
		header("Location:view_submitted_assignments.php?message=Marks Must Not Be Null ");
	}

	if(isset($_POST['submit']))
	{
		$sqlquery = "SELECT * FROM given_assignments_project2 WHERE Assign_No='$valuefrompost2'";
		$resultsqlquery = mysqli_query($connect,$sqlquery);
		if ($resultsqlquery) {
			$row =mysqli_fetch_assoc($resultsqlquery);
			if($marks>$row["Assign_Marks"])
			{
			header("Location:view_submitted_assignments.php?message=Marks Must Be Less/Equal To ".$row["Assign_Marks"]." For The Current Assignment");
			}
			elseif($marks<$row["Assign_Marks"] || $marks=$row["Assign_Marks"])
			{
					$sqlquery4 = "UPDATE assignments_project2 SET Marks='$marks',Check_Date=NOW() WHERE Student_Email='$valuefrompost1' AND Assignment_No='$valuefrompost2'";
					$resultsqlquery4 = mysqli_query($connect,$sqlquery4);
					if ($resultsqlquery4) {
						header("Location:view_submitted_assignments.php");
					}
					elseif (!$resultsqlquery4) {
						echo "Could Not Assign Marks 4851";
					}
			}

		}
		elseif (!$resultsqlquery) {
			echo "Could Not Assign Marks 78948561";
		}


		
	}
	elseif (!isset($_POST['submit'])) {
			header("location: view_submitted_assignments.php?message=Upload Assignment Button Not Set");
	}
?>