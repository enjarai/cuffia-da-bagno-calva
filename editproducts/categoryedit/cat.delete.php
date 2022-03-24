<?php
global $con;
require_once '../../config/db.php';

if (isset($_GET['CatDel']))
{
    $categoryid = $_GET['CatDel'];
    $query = "delete from categories where categoryid = '".$categoryid."'";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        header("location:cat.view.php");
    }
    else
    {
        echo ' Please check your Query';
    }
}
else
{
    header("location:cat.view.php");
}
?>
