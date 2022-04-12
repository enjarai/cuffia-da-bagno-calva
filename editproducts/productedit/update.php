<?php
global $con;
require_once '../../config/db.php';
if (isset($_POST['update']))
{
   $productid = $_GET['ID'];
   $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vega = isset($_POST['vega']) ? 1 : 0;
    $categoryid = $_POST['categoryid'];

    $query = "update products set name = '".$name."', description = '".$description."', price = '".$price."', vega = '".$vega."', categoryid = '".$categoryid."' where productid= '".$productid."' ";
    $result = mysqli_query($con, $query);

    if ($result)
    {
        header("location:view.php");
    }
    else
    {
      echo 'Please check you query';
    }
}
else
{
    header("location:view.php");
}
