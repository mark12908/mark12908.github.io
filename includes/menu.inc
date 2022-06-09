<div class="navbar">
    <nav>
        <ul>
        <?php
			if (isset($_SESSION['StudentId']) && isset($_COOKIE['attempts'])) {
				$user = $_SESSION['StudentId'];
				// echo "<a>Signed in as:</a><a id='selected'>  $user </a>";
				// echo "</a>";
                echo '<a href="manage.php">Manage Quiz</a>';
			} else { // not logged in

			}
			?>
            <li><a id="home" id="selected" href="index.php">Home</a></li>
            <li><a href="topic.php">About PHP</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="enhancements.php">Enhancements</a></li>
        </ul>
    </nav>
</div>