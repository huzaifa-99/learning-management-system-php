<!DOCTYPE html>
<html>
<head>
	<title>New User Registeration</title>
	<!--Bootstrap Link-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <!--External Css Link-->
	  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<center>
	<h1 class='margintop marginbottom'>New User Registeration</h1>
	<!--Get Registeration Credentials from the admin and send them to **************** page-->
	<form method="post" action="" enctype="multipart/form-data">
		<input type="text" name="fname" id="fname" placeholder="First_Name" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="text" name="lname" id="lname" placeholder="Last_Name" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="email" name="registerationemail" id="registerationemail" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" placeholder="Email" required>
		<br>
		<input type="password" name="pass1" id="pass1" placeholder="Password" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="password" name="pass2" id="pass2" placeholder="Confirm Password" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<br>
		<input type="file" name="img" id="img" placeholder="Profile Picture" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<select name="usertype" class="col col-lg-5 col-xl-5 col-md-5 col-sm-12 form-control" required>
			<option value="">Select User Type</option>
			<option value="Student">Student</option>
			<option value="Teacher">Teacher</option>
			<option value="Admin">Admin</option>
		</select>
		<select name="semesterenroll" class="col col-lg-5 col-xl-5 col-md-5 col-sm-12 form-control" required>
			<option value="">Select Semester</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select>
		<input type="submit" name="register" id="register" class="height btn btn-success col col-xs-12 col-sm-12 col-md-10 col-lg-10" value="Register">
	</form>
	<?php
		require_once('../dbconnection.php');
      	require 'verify_user_logged_in.php';
		if (isset($_POST['fname']) && $_POST['fname']!=="") { $fname=$_POST['fname']; }
		if (isset($_POST['lname']) && $_POST['lname']!=="") { $lname=$_POST['lname']; }
		if (isset($_POST['registerationemail']) && $_POST['registerationemail']!=="") { $registerationemail=$_POST['registerationemail']; }
		if (isset($_POST['pass1']) && $_POST['pass1']!=="") { $pass1=$_POST['pass1']; }
		if (isset($_POST['pass2']) && $_POST['pass2']!=="") { $pass2=$_POST['pass2']; }
		if (isset($_POST['img']) && $_POST['img']!=="") { $img=$_POST['img']; }
		if (isset($_POST['usertype']) && $_POST['usertype']!=="") { $usertype=$_POST['usertype']; }
		if (isset($_POST['semesterenroll']) && $_POST['semesterenroll']!=="") { $semesterenroll=$_POST['semesterenroll']; }
		if (isset($_POST['register'])) {

				//check if both passwords match
				//if not match
				if ($pass1!==$pass2) {

					echo "<script>alert('Your Passwords Dont Match');</script>";
					echo "Your Passwords Dont Match";

				}
				// if they match 
				elseif ($pass1===$pass2) {

					//check if email is already registered
					$sqlquery1 = "SELECT Email FROM user_reg_data_project2 WHERE Email='$registerationemail' ";
					$resultsqlquery1 = mysqli_query($connect,$sqlquery1);
					// if the email is found from database 
					if(mysqli_num_rows($resultsqlquery1)==1){
							echo "This Email Is already Registered";
					}
					// if the typed email is not found in database
					elseif(mysqli_num_rows($resultsqlquery1)==0){
						// check the image file for valid extensions and name
						////////////declare picture variables
						$imgname=addslashes($_FILES["img"]["name"]);
						$imgdata=addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
						$filetype=addslashes($_FILES["img"]["type"]);
						$array = array('jpg','jpeg');
						$ext =pathinfo($imgname,PATHINFO_EXTENSION);

						//////////if the image name is empty
							if(!empty($imgname)){
					  			if(in_array($ext, $array))
					  			{
					  				// insert the data entered by user into the database.
									$sqlquery2 = "INSERT INTO user_reg_data_project2 (First_Name,Last_Name,Email,Password,Image_Name,Image_Data,User_Type,Enrolled_In_Semester) VALUES ('$fname','$lname','$registerationemail','$pass1','$imgname','$imgdata','$usertype','$semesterenroll')";
									$resultsqlquery2 =mysqli_query($connect,$sqlquery2);
									// if data  not inserted
									if (!$resultsqlquery2) {
										echo "Could not insert data into database";
									}
									// if data inserted
									elseif ($resultsqlquery2) {
										echo "Data Inserted Into Database";
									}
					  			}
					  			else
					  			{
					  				echo "unsupported image file format";
					  			}
							}
							/////////if the image name is not empty
							else{
								echo "Please select the profile image";
							}
					} 	

				}
		}

	?>
	</center>
</body>
</html>