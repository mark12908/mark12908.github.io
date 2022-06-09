<?php
	session_start(); 
	session_destroy(); // Destroy the session itself.
	setcookie ("mark",  "",  time() - 3600);// Destroy the user name cookie	
	header("Location: login.php");
	
?>