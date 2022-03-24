<?php
global $con;
require_once '../../config/db.php';

if (isset($_GET['Del']))
{
    $productid = $_GET['Del'];
    $query = "delete from products where productid = '".$productid."'";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        header("location:view.php");
    }
    else
    {
        echo ' Please check your Query';
    }
}
else
{
 header("location:view.php");
}
?>