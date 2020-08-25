<?php
session_start();
require_once('../dbconnection.php');
require 'verify_user_logged_in.php';

if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (is_null($id)) {
			echo "id is null";
		}
		elseif (!is_null($id)) {
			//echo "id is not null";
			//echo "$id";
		}

		$query = "SELECT * FROM assignments_project2 WHERE Id = '$id'";
		$result = mysqli_query($connect,$query) or die('Error, query failed');
		if(mysqli_num_rows($result)>1){echo "string0";}

		elseif(mysqli_num_rows($result)==0){echo "string1";echo $id;}
		elseif(mysqli_num_rows($result)==1){
			//echo "string2";
			list($id, $sid, $s_email, $semesterno,$course,$assignno,$assignname,$assigndata) = mysqli_fetch_array($result);		
			//echo "stringx";

			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=$assignname");
			header("Expires: 0");
			header("Cache-Control: must-revalidate");
			header("Pragma: public");
			//header("Content-length:".filesize($assigndata));
			ob_clean();  /*they are necessary if not entered then file will be downloaded but cannot be opened*/
			flush();     /*they are necessary if not entered then file will be downloaded but cannot be opened*/
			echo $assigndata;
			//echo "string";
			mysqli_close($connect);
			//header("location: view_upload_assignments.php?message= hey");
			exit;
		}

}
elseif (!isset($_GET['id'])) {
		echo "Id Not Set";
	}
// Use a prepared statement in production to avoid SQL injection;
// we can get away with this here because we're the only ones who
// are going to use this script.

else {
	header("location : index.php");
}
?>