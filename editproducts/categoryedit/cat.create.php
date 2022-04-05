<?php
?>
    <form action="cat.create.inc.php" method="post">
        <input type="text" name="name"  placeholder="name...">

        <button type="submit" name="submit">create category</button>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "nametaken") {
        echo "<p>name already taken!</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>You have made a category!</p>";
    }
}
