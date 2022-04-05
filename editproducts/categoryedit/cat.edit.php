<?php
global $con;
require_once '../../config/db.php';
$categoryid = $_GET['CatGetID'];
$query = "select * from categories where categoryid='".$categoryid."'";
$result = mysqli_query($con, $query);

while ($row=mysqli_fetch_assoc($result))
{
    $categoryid = $row['categoryid'];
    $name = $row['name'];
}
?>
<form action="cat.update.php?ID=<?php echo $categoryid?>" method="post">

    <input type="text" name="name"  placeholder="name..." value="<?php echo $name ?>">

    <button type="submit" name="update">Update</button>

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

