<?php
	include("header.inc");
	include("menu.inc");
	require("database.php");
	$AttemptId = $_GET['subject'];
	// $AttemptId = $_SESSION['user_name'];
	// echo"$AttemptId";
	
	$query = "DELETE from attempt WHERE (AttemptId = '$AttemptId')";
	$result = mysqli_query($con, $query);
	
	if($result){
		header("Location: manage.php");
	}
	else{
		echo "You have a problem deleting the record";
	}



?>