<?php
session_start();
require_once('../dbconnection.php');
require 'verify_user_logged_in.php';
if (isset($_POST['topic']) && $_POST['topic']!=="") {$topic =$_POST['topic'];}
if (isset($_POST['deadline']) && $_POST['deadline']!=="") {
	$deadline =$_POST['deadline'];
	$today = date('Y-m-d');
	if($deadline<$today)
	{
		// i tried header here but it was not redirecting so i copied this javascript code from stackoverflow which was also not running without the exit command right after it.
		echo"<script type='text/javascript'>window.location.href = 'give_assignments_form.php?message1=Date is not valid! Please Enter A Valid Date';</script>";
		exit;
	}
	
}

if (isset($_POST['marks']) && $_POST['marks']!=="") {$marks =$_POST['marks'];}
if (isset($_POST['assignmentnumber']) && $_POST['assignmentnumber']!==""){$assignmentnumber =$_POST['assignmentnumber'];}
if (isset($_POST['giveassignment'])) {

	//------------this is for incrementing the assignment no every time a teacher gives assignment--------
	//is k liay coloumn ki datatype ko varchar sy change kia tha aur int kia tha warna wo 9 sy bara output nhi dy rh atha browser mai aur 10 sy bari value nhi dal raha tha table mai
	$sqlquery12="SELECT MAX(Assign_No) AS Max FROM given_assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}'";
	$resultsqlquery12=mysqli_query($connect,$sqlquery12);
	if(!$resultsqlquery12){echo 'ERROR';}
	elseif($resultsqlquery12){
		$roww= mysqli_fetch_array($resultsqlquery12);
		$xx = $roww['Max'];
		echo $xx;
		$xx++;
		$sqlquery13="INSERT INTO given_assignments_project2 (Semester_No,Course_No,Assign_No,Assign_Topic,Assign_Marks,Dategiven,Deadline) VALUES ('{$_SESSION['semester']}','{$_SESSION['course']}','$xx','$topic','$marks',NOW(),'$deadline')";
		$resultsqlquery13 = mysqli_query($connect,$sqlquery13);
		if ($resultsqlquery13) {
			 header("location: give_assignments_form.php?message1=Assignment Added And Given To Students");
		}
		elseif (!$resultsqlquery13) {
			 header("location: give_assignments_form.php?message1=Could Not Add Assignment To Database");
		}	
	}
	//-------------------------------------------



	//-------------------------------------------------------------------------------------------------
	//------------jab teacher ny khud assignmnet number likhna ho to is k liay likha tha---------------
	//-------------------------------------------------------------------------------------------------
	/*$sqlquery12 = "SELECT * FROM given_assignments_project2 WHERE Assign_No='$assignmentnumber' AND Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}'";
	$resultsqlquery12 = mysqli_query($connect,$sqlquery12);
	if (mysqli_num_rows($resultsqlquery12)>0) {
	 header("location: give_assignments_form.php?message1=This Assignment Is Already Assigned");
	}
	elseif (mysqli_num_rows($resultsqlquery12)==0) {
		$sqlquery13 = "INSERT INTO given_assignments_project2 (Semester_No,Course_No,Assign_No,Assign_Topic,Assign_Marks,Dategiven,Deadline) VALUES ('{$_SESSION['semester']}','{$_SESSION['course']}','$assignmentnumber','$topic','$marks',NOW(),'$deadline')";
		$resultsqlquery13 = mysqli_query($connect,$sqlquery13);
		if ($resultsqlquery13) {
			 header("location: give_assignments_form.php?message1=Assignment Added And Given To Students");
		}
		elseif (!$resultsqlquery13) {
			 header("location: give_assignments_form.php?message1=Could Not Add Assignment To Database");
		}
	}*///-------------------------------------------------------------------------------------------------
}
else
{
	header("location: give_assignments_form.php");
}
?>