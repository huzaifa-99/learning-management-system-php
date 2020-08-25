<!DOCTYPE html>
<html>
<head>
	<title>Delete A Registered User</title>
	<!--Bootstrap Link-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <!--External Css Link-->
	  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<center>
	<h1 class='margintop marginbottom'>Delete Registered User</h1>
	<!--Get Deletion Credential from the admin and send them to **************** page-->
	<form method="post" action="">
		<input type="email" name="deleteemail" id="deleteemail" class="col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" placeholder="Email" required>
		<br>
		<input type="submit" name="deleteuser" id="deleteuser" class="height btn btn-success col col-xs-12 col-sm-12 col-md-10 col-lg-10" value="Delete User">
	</form>
	<?php
		require_once('../dbconnection.php');
		require 'verify_user_logged_in.php';
		if (isset($_POST['deleteemail']) && $_POST['deleteemail']!=="") { $deleteemail=$_POST['deleteemail'];}
		if (isset($_POST['deleteuser'])) {
				// check if the email exists in the database
				$sqlquery4 = "SELECT Email FROM user_reg_data_project2 WHERE Email='$deleteemail'";
				$resultsqlquery4 = mysqli_query($connect,$sqlquery4);
				// if not found
				if (mysqli_num_rows($resultsqlquery4)==0) {
						echo "The Email You Entered Is Not Registered To The Database";
				}
				// if found from database
				elseif (mysqli_num_rows($resultsqlquery4)==1) {
						// delete query
						$sqlquery5 = "DELETE FROM user_reg_data_project2 WHERE Email='$deleteemail'";
						$resultsqlquery5 = mysqli_query($connect,$sqlquery5);
						// if not deleted then 
						if (!$resultsqlquery5) {
							echo "Could not delete the user from database";
						}
						// if data deleted then
						elseif ($resultsqlquery5) {
							echo "Record Deleted From Database";
						}
						// for unexpected error
						else
						{
							echo "echo Error x016789";
						}
				}
				// for unexpected error
				else{
					echo "echo Error x016789";
				}
		}
	?>
	</center>
</body>
</html>