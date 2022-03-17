<?php

if (isset ($_POST ["submit"])) {
    $name =&$_POST["name"];
    $email =&$_POST["email"];
    $username =&$_POST["uid"];
    $pwd =&$_POST["pwd"];
    $pwdRepeat =&$_POST["pwdrepeat"];

    require_once '../../config/db.php';
    require_once 'functions.inc.php';

    $con = true;


    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }


    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($con,$username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($con, $name, $email, $username, $pwd);
}
else {
    header("location: ../signup.php");
    exit();
}
