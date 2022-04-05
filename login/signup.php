<?php
session_start();

if (!isset($_SESSION["useruid"])) {
    header("location: login.php");
    die;
}
?>
<section class="signup-form">
    <link rel="stylesheet" href="login.css">

<form action="includes/signup.inc.php" method="post">
    <div class="container">
        <div class="form__input-group">
            <div class="form__title">

            <div class="form">
                <div class="form__text-type">
        <h1 class="form__title">Create Account</h1>
                   <div class="form__input:focus">
    <div>
    <input type="text" name="name" class="form__input" placeholder="Full name..."> </div>
    <div>
    <input type="text" name="email" class="form__input" placeholder="Email..."> </div>
        <div>
    <input type="text" name="uid" class="form__input" placeholder="Username..."> </div>
            <div>
    <input type="password" name="pwd" class="form__input" placeholder="Password..."> </div>
                <div>
    <input type="password" name="pwdrepeat" class="form__input" placeholder="Repeat password..."> </div>
    <button type="submit" name="submit" class="form__button">Sign Up</button>
    <p class="form__text"></p>
                   </div>
                </div>
            </div>
            </div>
        </div>
        <div class="form__text-type">
           <div class="form__text-align">
</form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        }
        else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords doesn't match!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong!</p>";
        }
        else if ($_GET["error"] == "usernametaken") {
            echo "<p>username already taken!</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
    }
    ?>
</div>
</div>
</div>
</section>





