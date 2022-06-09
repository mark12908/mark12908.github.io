<?php
include("header.inc");
include("menu.inc");
require("database.php");
	if(isset($_SESSION['user_name']) && isset($_COOKIE['mark']))   {	//this is the button clicked

		$query = "SELECT * FROM attempt"; //
		$result = mysqli_query($con, $query);
		
		echo "<table class='track' border = '2' width = '700' height = '400' align = 'center'>";
		echo "<tr><th>AttemtId</th>
        <th>Date And Time of attempt</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Number of Attempts</th>
        <th>Score</th>
        </tr>";
		while($row = mysqli_fetch_array($result))
		{ //fetch the array of the records
		echo "<tr>";
		echo "<td>" . $row["AttemptId"];
		echo "<td>" . $row["DateAndTime"];
        echo "<td>" . $row["FirstName"];
        echo "<td>" . $row["LastName"];
        echo "<td>" . $row["AttemptNumber"];
        echo "<td>" . $row["Score"],'%';
         // echo "<td><a href='delete.php id=", $row['AttemptId'], ";'>Delete</a></td>";
		echo "<td><a href='delete.php?subject=", $row['AttemptId'], "'onclick='return
		confirm (\"Are you sure! you want to delete the quote?\");'>Delete</a></td>";
		echo "<td><a href='reset.php?reset=", $row['AttemptId'], "'onclick='return
		confirm (\"Are you sure! you want to delete the quote?\");'>Reset Attempt</a></td>";
		echo "</tr>";
		}
		echo "</table>";
        echo "<a href='logout.php'>Logout</a>";
	}//logged in
	
	else{// not logged in

	echo "<h1 style = 'color: red'>Please log in first.</h1>";
  
    
	
	}


include("footer.inc");
?>