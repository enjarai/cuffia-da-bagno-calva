<?php
?>
    <form action="create.inc.php" method="post">
<input type="text" name="name"  placeholder="name...">

    <input type="text" name="description"  placeholder="description...">

    <input type="text" name="price"  placeholder="price...">

    <input type="text" name="vega"  placeholder="vega...">

    <input type="text" name="categoryid" placeholder="categoryid...">

<button type="submit" name="submit">create product</button>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "nametaken") {
        echo "<p>name already taken!</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>You have made a product!</p>";
    }
}