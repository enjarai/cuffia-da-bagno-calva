<?php
global $con;
require_once '../../config/db.php';
if (isset($_POST['update']))
{
    $categoryid = $_GET['ID'];
    $name = $_POST['name'];

    $query = "update categories set name = '".$name."' where categoryid = '".$categoryid."' ";
    $result = mysqli_query($con, $query);

    if ($result)
    {
        header("location:../../menukaart.php");
    }
    else
    {
        echo 'Please check you query';
    }
}
else
{
    header("location:../../menukaart.php");
}
