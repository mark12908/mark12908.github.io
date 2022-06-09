<?php
include("header.inc");
include("menu.inc");
require("database.php");
if(isset($_POST["registry"])){ 
   $FirstName = clean_input($_POST["FirstName"]);
    $LastName = clean_input($_POST["LastName"]);
    $StudentId = clean_input($_POST["StudentId"]);
    $errors = "";

if ($StudentId == "") { // Error message if student id is empty
   $errors = "<h4>You forgot to enter Student ID</h4>";
}
else if (!preg_match("/^(\d{7}|\d{9})$/", $StudentId)) { // Error message if student id isnt 7 or 10 digits
   $errors = $errors . "<p>The number needs to be 7 or 9 digits.</p>";
}
if ($FirstName == "") { // Error message if first name is empty
   $errors = $errors . "<h4>You forgot to enter First Name</h4>";
}
else if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $LastName)) { // Error message if firstname isnt alphanumeric or isnt within 30 characters
   $errors = $errors . "<p>First name is 30 alphanumeric characters max. You can't have any special character except a hyphen or a space.</p>";
}
if ($LastName == "") { // Error message if last name is empty
   $errors = $errors . "<h4>You forgot to enter Last Name</h4>";
}
else if (!preg_match("/^[a-zA-Z- ]{0,30}$/", $LastName)) { // Error message if lastname isnt alphanumeric or isnt within 30 characters
   $errors = $errors . "<p>Last name is 30 alphanumeric characters max.</p>";
}
}

if(isset($_POST['registry'])){
   if($_SESSION['AttemptNumber'] <=1){
   array_key_exists('AttemptNumber', $_SESSION) ? $_SESSION['AttemptNumber']++ : ($_SESSION['AttemptNumber'] =0);
   echo $_SESSION['AttemptNumber'];
   $AttemptNumber = $_SESSION['AttemptNumber'];

 }
   else {
       $AttemptNumber = $_SESSION['AttemptNumber'];
       echo "You cannot attempt more than twice";
 }
}

if (empty($errors)) {
echo '<main>
         <article>
               <div class="main">
                  <h1>PHP Topic Quiz</h1>
                  <form method="post"  action="markquiz.php" novalidate="novalidate">';
}
?>
                     <fieldset>
                        <legend>
                           <h2>Student Details</h2>
                        </legend>
                        <p><label for="firstname"><strong>First Name</strong></label> 
                           <input type="text" name= "FirstName" id="firstname" maxlength="30" size="10" pattern="[a-zA-Z- ]+"  required="required"/>
                           <label for="lastname"><strong>Last Name</strong></label> 
                           <input type="text" name= "LastName" id="lastname" maxlength="30" size="10" pattern="[a-zA-Z- ]+" required="required"/>
                           <label for="studentid"><strong>Student ID</strong></label> 
                           <input type="text" name= "StudentId" id="studentid" maxlength="10" pattern="^(\d{7}|\d{10})$" required="required"/>
                        </p>
                     </fieldset>

                     <fieldset>
                        <legend>
                           <h2>Quiz Questions</h2>
                        </legend>
                        <label for="question"><strong>1. What symbol do you use for starting PHP variable?</strong></label> 
                        <input type="text" name= "question" id="question" maxlength="15" size="10" required="required"/>
                        <br /><br />
                        <p> 
                        <p><strong>2. What does PHP stand for?</strong></p>
                        <input type="radio" id="name1" name="name" value="1" required="required"/>
                        <label for="name1"><em>Hypertext Preprocessor</em></label>
                        <input type="radio" id="name2" name="name" value="0"/>
                        <label for="name2" ><em>Pre Hypertext Processing</em></label> 
                        <input type="radio" checked="true" id="name3" name="name" value="0"/>
                        <label for="name3"><em>Programmable Home Prototype</em></label>
                        <input type="radio" id="name4" name="name" value="0"/>
                        <label for="name4"><em>Personal Hypertext Process</em></label>  
                        </p>
                        <br />
                        <p>
                           <label for="option"><strong>3. How to end a PHP statement?</strong></label> 
                           <select name="option" id="option" required="required">
                              <option value="">Please Select</option>
                              <option value="0">newline</option>
                              <option value="0">php</option>
                              <option value="0">?</option>
                              <option value="1">;</option>
                           </select>
                        </p>
                        <br />
                        <p><strong>4. Which of these are PHP statements?</strong></p>
                        <p><label for="state1"><em>echo "My first PHP script!";</em></label> 
                           <input type="checkbox" id="state1" name="state" value="state1"/>
                           <label for="state2"><em>$txt = "Hello world!";</em></label> 
                           <input type="checkbox" checked="true" id="state2" name="state" value="state2"/>
                           <label for="state3"><em>Console.WriteLine("Hello World!");</em></label> 
                           <input type="checkbox" id="state3" name="state" value="state3"/>
                           <label for="state4"><em>print("Hello, World!")</em></label> 
                           <input type="checkbox" id="state4" name="state" value="state4"/>
                           <label for="state5"><em>document.getElementById("name")</em></label> 
                           <input type="checkbox" id="state5" name="state" value="state5"/>
                        </p>
                        <br />
                        <p><label for="date"><strong>What year was PHP created?</strong></label> 
                           <input value="1" type="number" name= "date" id="date" placeholder="yyyy" min="1900" max="2022" maxlength="4" size="10" required="required"/>
                        </p>
                        <br />
                        <p><label for="color"><strong>For the PHP statement $color = 'rgb(255,255,255)'; match the value with the color picker.</strong></label> 
                           <input value="1" type="color" name= "color" id="color" maxlength="10" size="10" required="required"/>
                        </p>
                     </fieldset>
                     <br />
                     <input type= "submit" value="Submit" name="registry"/>
                     <input type= "reset" value="Reset Quiz"/>
                  </form>

                  <br />
               </div>
               <br />
            </td>
         </tr>
      </article>
<?php
include("footer.inc");
?>