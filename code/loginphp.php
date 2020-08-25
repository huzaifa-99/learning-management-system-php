<?php
		session_start();
		require_once('dbconnection.php');
		if (isset($_POST['loginemail']) && $_POST['loginemail']!=="") { $loginemail=$_POST['loginemail']; }
		if (isset($_POST['loginpassword']) && $_POST['loginpassword']!=="") { $loginpassword=$_POST['loginpassword']; }
		if (isset($_POST['usertype']) && $_POST['usertype']!=="") { $usertype=$_POST['usertype']; }
		if (isset($_POST['login'])) {
			// select user data which matches the entered email and password
			$sqlquery3 ="SELECT * FROM user_reg_data_project2 WHERE Email='$loginemail' AND Password='$loginpassword' AND User_Type='$usertype'";
			$resultsqlquery3 = mysqli_query($connect,$sqlquery3);
			// if a record is found 
				if(mysqli_num_rows($resultsqlquery3)==1){
					//fortesting # echo "Your data matches the one found from database";
					// now create a user session for the current user
					session_destroy(); // destroy the previous user session
					session_start();
					// fetch the data in the row which has the current users data
					$row = mysqli_fetch_assoc($resultsqlquery3);
					$_SESSION['Id']=$row["Id"];
					$_SESSION['Email']=$loginemail;
					$_SESSION['Password']=$loginpassword;
					$_SESSION['Image_Data']=$row["Image_Data"];
					$_SESSION['User_Type']=$row["User_Type"];
					$_SESSION['semester']=$row["Enrolled_In_Semester"];
					/**********************here we have to redirect the user on basis of his user type admin/student/teacher*****************/
					if ($usertype=="Student") { header("Location: home.php"); }  // student redirect
					if ($usertype=="Teacher") { header("Location: home.php"); }  // teacher redirect
					if ($usertype=="Admin")   { header("Location: admin/admin_panel.php"); }  // admin   redirect
					echo "<br>You Are A ".$usertype;
					echo '<br>User '.$_SESSION['Email'].' Has been logged in '.'<br><img src="data:image/jpeg;base64,'.base64_encode($row["Image_Data"]).'">';
				}
			// if no record is found
				elseif (mysqli_num_rows($resultsqlquery3)==0) {
					header("Location: home.php?message= Wrong Email Or Password");
				}
			// if the top 2 conditions dont get satisfied
				else{
					echo " echo Error x011";
				}
		}
	?>