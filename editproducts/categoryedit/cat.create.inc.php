<?php

if (isset ($_POST ["submit"])) {
    $name = $_POST['name'];
    global $con;
    require_once '../../config/db.php';
    require_once 'categoryfunctions.inc.php';

    if (emptyInputCreate($name) !== false) {
        header("location: create.php?error=emptyinput");
        exit();
    }
    if (nameExists($con, $name) !== false) {
        header("location: create.php?error=nametaken");
        exit();
    }
    createCategory($con, $name);
}