<?php
session_start();
?>


<?php
if (isset($_SESSION["useruid"])) {
    echo "<li><a href=''></a></li>";
    echo "<li><a href='signup.php'>Create Account</a></li>";
    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
}
else {
    echo "<li><a href='login.php'>Log in</a></li>";
}
