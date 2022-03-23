<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once '../../config/db.php';
    require_once 'functions.inc.php';
    global $con;

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($con, $username, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
