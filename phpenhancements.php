   <?php 
    include 'header.inc';
    include 'menu.inc';
    ?>
    <main>
        <article>
            <h2>PHP Enhancements</h2> 
            <p>The first PHP enhancement is the signup page.</p>
            <p>The second PHP enhancement is the login page.</p>
            <p>The signup page collects username and password, also needs to meet certain requirements. Sends it through to another sql file that inserts it into a table of usernames and passwords.</p>
            <p>The login page lets the user put their username and password, checks with the table to see if it right.</p>
        </article>
    </main>
    <?php 
    include 'footer.inc';
    ?>