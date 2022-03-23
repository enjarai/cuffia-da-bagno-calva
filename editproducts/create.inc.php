<?php

if (isset ($_POST ["submit"])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vega = $_POST['vega'];
    $categoryid = $_POST['categoryid'];

    require_once '../config/db.php';
    require_once 'productfunctions.inc.php';

    if (emptyInputCreate($name, $price, $vega, $categoryid) !== false) {
        header("location: create.php?error=emptyinput");
        exit();
    }
    if (nameExists($con, $name) !== false) {
        header("location: create.php?error=nametaken");
        exit();
    }
    createProduct($con, $name, $description, $price, $vega, $categoryid);
}