<?php
global $con;
require_once '../../config/db.php';
if (isset($_POST['update']))
{
   $productid = $_GET['ID'];
   $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vega = array_key_exists('vega', $_POST);
    $categoryid = $_POST['categoryid'];

    $stmt = $con->prepare("update products set name = ?, description = ?, price = ?, vega = ?, categoryid = ? where productid = ?;");
    $stmt->bind_param("ssdbii", $name, $description, $price, $vega, $categoryid, $productid);
    $stmt->execute();
    $result = $stmt->get_result();

    header("location:../../menukaart.php");

}
else
{
    header("location:../../menukaart.php");
}
