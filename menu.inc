<div class="navbar">
    <nav>
        <ul>
        <li><?php
			if (isset($_SESSION['user_name']) && isset($_COOKIE['mark'])) {
				$StudentId = $_SESSION['user_name'];
				echo "<a>Signed in as:</a><a id='selected'>$StudentId </a>";
				echo "</a>";
                echo '<a href="manage.php">Manage Quiz</a>';
			} else { // not logged in

			}
			?></li>
            <li></li>
            <li><a id="home" id="selected" href="index.php">Home</a></li>
            <li><a href="topic.php">About PHP</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="login.php">Log In</a></li>
            <li><a href="enhancements.html">Enhancements</a></li>
<li><a href="phpenhancements.php">PHPenhancements</a></li>

        </ul>
    </nav>
</div>