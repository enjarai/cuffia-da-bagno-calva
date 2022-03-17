<?php
?>

<section class="login-form">
    <link rel="stylesheet" href="login.css">
    <div class="container">
        <div class="form__input-group">
            <div class="form__title">

                <div class="form">
                    <div class="form__text-type">
    <h2>Login</h2>
    <form action="includes/login.inc.php" method="post">
        <div class="form__input:focus">
        <div>
        <input type="text" name="uid" class="form__input" placeholder="Username/Email..."> </div>
        <div>
        <input type="password" name="pwd" class="form__input" placeholder="Password...">
        </div>
        <button type="submit" name="submit" class="form__button">Login</button>
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
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information!</p>";
        }
    }
    ?>
        </div>
        </div>
</div>
</section>