   <?php 
    include 'header.inc';
    include 'menu.inc';
    ?>
      <main>
         <article>
	<div class="main">
<?php
require("database.php"); //connection info

function clean_input($data) { // This function filters the data for security purposes
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    $data = trim($data);
    return $data;
}

    $FirstName = clean_input($_POST["FirstName"]);
    $LastName = clean_input($_POST["LastName"]);
    $StudentId = clean_input($_POST["StudentId"]);
    $q1 = clean_input($_POST["question"]);
    $q2 = clean_input($_POST["name"]);
    $q3 = clean_input($_POST["option"]);
    $q4 = clean_input($_POST["state"]);
    $q6 = clean_input($_POST["date"]);
    $q7 = clean_input($_POST["color"]);
    $errMsg = ""; // Error message
    $correct = 0;
    
    $_SESSION['AttemptNumber'] = isset($_SESSION['AttemptNumber']) ? $_SESSION['AttemptNumber'] : 0;

    if ($StudentId == "") { // Error message if student id is empty
        $errMsg = "<p>You need to enter the student id.</p>";
        echo "<p>$errMsg</p>";
    }
    else if (!preg_match("/^(\d{7}|\d{10})$/", $StudentId)) { // Error message if student id isnt 7 or 10 digits
        $errMsg = "<p>The number needs to be 7 or 10 digits.</p>";
        echo "<p>$errMsg</p>";
    }
    if ($FirstName == "") { // Error message if first name is empty
        $errMsg = "<p>You need to enter the first name.</p>"; 
        echo "<p>$errMsg</p>";
    }
    else if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $FirstName)) { // Error message if firstname isnt alphanumeric or isnt within 30 characters
        $errMsg = "<p>First name is 30 alphanumeric characters max. You can't have any special character except a hyphen or a space.</p>";
        echo "<p>$errMsg</p>";
    }
    if ($LastName == "") { // Error message if last name is empty
        $errMsg = "<p>Last name is 30 alphanumeric characters max. You can't have any special character except a hyphen or a space.</p>";
        echo "<p>$errMsg</p>";
    }
    else if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $LastName)) { // Error message if lastname isnt alphanumeric or isnt within 30 characters
        $errMsg = "<p>Last name is 30 alphanumeric characters max.</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q1 == "$") {
        $errMsg = "<p>Correct Answer for Q1!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q1 != "$") {
        $errMsg = "<p>Wrong Answer for Q1!</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q2 == "1") {
        $errMsg = "<p>Correct Answer for Q2!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q2 != "1") {
        $errMsg = "<p>Wrong Answer for Q2!</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q3 == "1") {
        $errMsg = "<p>Correct Answer for Q3!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q3 != "1") {
        $errMsg = "<p>Wrong Answer for Q3!</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q4 == "state1") {
        $errMsg = "<p>Correct Answer for Q4!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q4 != "state1") {
        $errMsg = "<p>Wrong Answer for Q4!</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q6 == "1994") {
        $errMsg = "<p>Correct Answer for Q6!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q6 != "1994") {
        $errMsg = "<p>Wrong Answer for Q6!</p>";
        echo "<p>$errMsg</p>";
    }
    if ($q7 == "#ffffff") {
        $errMsg = "<p>Correct Answer for Q7!</p>";
        echo "<p>$errMsg</p>";
        $correct++;
    }
    else if ($q7 != "#ffffff") {
        $errMsg = "<p>Wrong Answer for Q7!</p>";
        echo "<p>$errMsg</p>";
    }
    $Score = round(($correct / 6) * 100, 0);

    if ($correct == 0) {
        echo"You scored $Score%, that is not a pass of 50% or over";
    }
    elseif ($correct == 1){
        echo"You scored $Score%, that is not a pass of 50% or over";
    }
    elseif ($correct == 2){
        echo"You scored $Score%, that is not a pass of 50% or over";
    }
    elseif ($correct == 3){
        echo"You scored $Score%, that is not a pass of 50% or over";
    }
    elseif ($correct == 4){
        echo"You scored $Score%, that is a pass of 50% or over";
    }
    elseif ($correct == 5){
        echo"You scored $Score%, that is a pass of 50% or over";
    }
    elseif ($correct == 6){
        echo"You scored $Score%, that is a pass of 50% or over";
    }
    elseif ($correct == 7){
        echo"You scored $Score%, that is a pass of 50% or over";
    } 
    $AttemptNumber = 1;
    $rattempt = 2 - $AttemptNumber;
    echo"<br /><a> You have attempted the quiz $AttemptNumber times.</a><br />";
    echo"<a> You have $rattempt attempts remaining.</a><br />";
    echo"<a href = quiz.php> Return to quiz page </a>";
    
    // Set up the SQL command to create table if it not exists

    $queryCreateAttemptsTable = "CREATE TABLE IF NOT EXISTS `attempt` (
    AttemptId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	DateAndTime varchar(50) DEFAULT NULL,
  	FirstName varchar(55) NOT NULL,
  	LastName varchar(55) NOT NULL,
  	StudentId varchar(10) NOT NULL,
  	AttemptNumber varchar(5) NOT NULL,
  	Score varchar(5) NOT NULL)";

    date_default_timezone_set("Australia/Melbourne");
        $DateAndTime = date("Y-m-d h:i:sa");
        $query = "SELECT * from attempt WHERE (StudentId = '$StudentId')";
        $result = mysqli_query($con, $query); //processing the query
        $num = mysqli_num_rows($result);
    if ($num == 0) {
            $query = "INSERT INTO attempt(DateAndTime, FirstName, LastName, StudentId, AttemptNumber, Score) 
            VALUES ('$DateAndTime','$FirstName', '$LastName', '$StudentId', '$AttemptNumber', '$Score')";
            $result = mysqli_query($con, $query); //processing the query
    }
 //no user found
    else {
        echo "You have already attempted the quiz.";
    }
    
    // execute the query and store result into the result pointer
    $result = mysqli_query($con, $queryCreateAttemptsTable);

//mysqli_close($con);


?>
</div>
</article>
   </main>
   <?php 
    include 'footer.inc';
    ?>