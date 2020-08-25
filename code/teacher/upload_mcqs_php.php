<?php
		session_start(); 
		echo "You Are Uploading mcq's of ".$_SESSION['semester']." semester and ".$_SESSION['course']." course";
		require_once('../dbconnection.php');
		require 'verify_user_logged_in.php';
		if (isset($_POST['question']) && $_POST['question']!=="") { $question =$_POST['question'];}
		if (isset($_POST['option1']) && $_POST['option1']!=="") { $option1 =$_POST['option1'];}
		if (isset($_POST['option2']) && $_POST['option2']!=="") { $option2 =$_POST['option2'];}
		if (isset($_POST['option3']) && $_POST['option3']!=="") { $option3 =$_POST['option3'];}
		if (isset($_POST['option4']) && $_POST['option4']!=="") { $option4 =$_POST['option4'];}
		if (isset($_POST['answer']) && $_POST['answer']!=="") { $answer =$_POST['answer'];}
		if (isset($_POST['uploadquestion'])) {
			// RUN THE QUERY TO INERT QUESTION IN DATABASE
			$sqlquery9 = "INSERT INTO questionpapers_project2 (Semester_No,Course_No,Question,Op1,Op2,Op3,Op4,Answer) VALUES ('{$_SESSION['semester']}','{$_SESSION['course']}','$question','$option1','$option2','$option3','$option4','$answer')";
			$resultsqlquery9 = mysqli_query($connect,$sqlquery9);
			// IF THE QUERY DOESNOT RUN SUCCESSFULLY
			if (!$resultsqlquery9) {
				echo "Could Not Insert Question Into Database";
			}
			// IF THE QUERY RUNS SUCCESSFULLY
			elseif ($resultsqlquery9) {
				echo "Question Added In Database";
			}
		}
?>