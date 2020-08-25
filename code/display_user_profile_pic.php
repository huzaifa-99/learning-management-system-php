<?php
require_once('dbconnection.php');/*yahan py aik logout wala system krna hai*/
$sqlq31 = "SELECT * FROM user_reg_data_project2 WHERE Id='{$_SESSION['Id']}'";
$resultsqlq31 = mysqli_query($connect,$sqlq31);
if($resultsqlq31)
{
	while($row=mysqli_fetch_array($resultsqlq31)){
	echo '<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top"><ul class="navbar-nav">
	<li>
		  	<span class="navbar-text"><strong>XYZ-Learning Management System</strong></span></li><li><span class="navbar-text">'.$row['Email'].'</span></li><li><img src="data:image/jpeg;base64,'.base64_encode($row['Image_Data']).'" class="img-thumbnail" style="height:40px;width:40px;"></li><a href="logout.php"><button class="btn btn-primary col col-xs-12 col-sm-12 col-md-12 col-lg-12">Logout</button></a></ul>
	</nav>';
}
}
elseif (!$resultsqlq31) {
	echo "Could Not Display Profile Pic";
}
?>