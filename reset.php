<?php
	include("header.php");
	include("menu.php");
	require("database.php");
	$AttemptId = $_GET['reset'];
	
	$query = "UPDATE attempt SET AttemptNumber = '0' WHERE AttemptId = '$AttemptId' ";
	$result = mysqli_query($con, $query);
	
	if($result){
		header("Location: manage.php");
	}
	else{
		echo "You have a problem deleting the record";
	}



?>