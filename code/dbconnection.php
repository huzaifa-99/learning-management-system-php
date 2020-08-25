<?php
	$connect = mysqli_connect("localhost","root","");
	mysqli_select_db($connect,'attendence_system_php');
	if(!$connect)
	{
		echo "Database Connection Failed<br>";
	}
	elseif ($connect) {
		//echo "Database Connection Working<br>";
	}
		
?>