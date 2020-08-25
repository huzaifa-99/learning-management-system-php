<?php
	session_start();
	require_once('../dbconnection.php');
	require 'verify_user_logged_in.php';
	//print_r($_POST['assignmentnumber']);
	$valuefrompost="";
	foreach ($_POST['assignmentnumber'] as $key => $value) {
		//echo "string";
		$valuefrompost=$value;
	}
	if(isset($valuefrompost))
	{

	}
	elseif (!isset($valuefrompost)) {
		echo "NOT SET $valuefrompost";
	}
	//exit();
	/*if (isset($_POST['assignmentnumber']) && $_POST['assignmentnumber']!=="") { $assignmentnumber = $_POST['assignmentnumber'];}
	elseif (!isset($_POST['assignmentnumber'])) {
		header("location: course_assignments_students.php?meaasge=Assignment Number Is Not Set");
	}*/
	if(isset($_POST['submitassignment']))
	{
		session_start();
		$sqlquery4 = "SELECT * FROM assignments_project2 WHERE Assignment_No='$valuefrompost' AND Course_No='{$_SESSION['course']}'
		AND Student_Email='{$_SESSION['Email']}'";
		$resultsqlquery4 = mysqli_query($connect,$sqlquery4);
		// if the current assignment is not submitted
		if (mysqli_num_rows($resultsqlquery4)==0) {
			/*yahan sy kam karna hai ab session ki values ko enter karna hai table mai*/
			$filename = addslashes($_FILES['uploadassignment']['name']);
			$filetype = addslashes($_FILES['uploadassignment']['type']);
			$data = addslashes(file_get_contents($_FILES['uploadassignment']['tmp_name']));
					$array = array('pdf');//'docx',
					$ext =pathinfo($filename,PATHINFO_EXTENSION);
			if (!in_array($ext, $array)) {															/*MS-Word And*/
				header("location: submit_assignments.php?message=Unsupported File Format.Only Pdf are accepted");
			}
			elseif (in_array($ext, $array)) {
				$sqlquery5 = "INSERT INTO assignments_project2 (Student_ID,Student_Email,Semester_No,Course_No,Assignment_No,Assignment_FileN,Assignment_FileD,Upload_Date) VALUES ('{$_SESSION['Id']}','{$_SESSION['Email']}','{$_SESSION['semester']}','{$_SESSION['course']}','$valuefrompost','$filename','$data',NOW())";
				$resultsqlquery5 = mysqli_query($connect, $sqlquery5);
				if ($resultsqlquery5) {
					header("location: submit_assignments.php?message=Assignment Submitted");
				}
				elseif (!$resultsqlquery5) {
					header("location: submit_assignments.php?message=Could Not Submit Assignment");
				}
			}
		}
		// if it is already submitted
		elseif (mysqli_num_rows($resultsqlquery4)==1) {
			header("location: submit_assignments.php?message=This Assignment is Already Submitted");
		}
		elseif (mysqli_num_rows($resultsqlquery4)>1) {
			header("location: submit_assignments.php?message=Many Assignment With Same Number Already Submitted");
		}

	}
	elseif (!isset($_POST['submitassignment'])) {
			header("location: submit_assignments.php?message=Upload Assignment Button Not Set");
	}					
?>