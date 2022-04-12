<?php
global $con;
require_once '../../config/db.php';
$productid = $_GET['GetID'];
$query = "select * from products where productid='".$productid."'";
$result = mysqli_query($con, $query);

while ($row=mysqli_fetch_assoc($result))
{
    $productid = $row['productid'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $vega = $row['vega'];
    $categoryid = $row['categoryid'];
}
?>
    <form action="update.php?ID=<?php echo $productid?>" method="post">

    <input type="text" name="name"  placeholder="name..." value="<?php echo $name ?>">

        <input type="text" name="description"  placeholder="description..." value="<?php echo $description ?>">

        <input type="text" name="price"  placeholder="price..." value="<?php echo $price ?>">

        <input type="checkbox" name="vega"  placeholder="vega..." value="true" <?php echo $vega ? "checked" : ''; ?>">

        <input type="text" name="categoryid" placeholder="categoryid..." value="<?php echo $categoryid ?>">

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
