<?php
	include("header.inc");
    include("menu.inc");
	require("database.php");
	if(isset($_POST["login"])){
		$FirstName = mysqli_real_escape_string($con,$_POST["FirstName"]);
		$StudentId = mysqli_real_escape_string($con,$_POST["StudentId"]);
		if($FirstName == 'Admin' & $StudentId == '000000000'){
			$query = "SELECT * from attempt WHERE (FirstName = '$FirstName' and StudentId = '$StudentId')";
			$result = mysqli_query($con, $query);
			$num = mysqli_num_rows($result);
			
			if($num==0){
				echo "The Firstnane or the Student ID is incorrect";
			}//cannot login
			else{
				
				$row = mysqli_fetch_array($result);

				$_SESSION['user_name']=$row['FirstName'];
				$name =$row['FirstName'];
				setcookie("mark",  $name,  time()+60*60*2); // last 2 hours

				header("Location: manage.php");
			}//can login
		}
		else{
			echo'<p>Sorry only an Admin can login</p>';
		}
}//end submit
	
?>

		  <div class="main">
		  <form class="form" action = "login.php" method = "post">
				<fieldset class="field">
				<legend><h3>Login</h3></legend>
				
				
				<p>Enter first Name
				<input type = "text" placeholder = "enter your first name here" name = "FirstName" />
</p>
				
				
				<p>
				enter Student Id
				<input type = "text" name = "StudentId" placeholder = "enter your StudentId here" />
				</p>
				
				
				<input type ="submit" value = "Confirm" name="login" />
				
				</fieldset>
				
				</div>
			
			</form>
		  </div>

		 
		  <?php
		include("footer.php");
		?>