<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat): bool
{
   return empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat);
}

function invalidUid($username): bool
{
   return !preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function invalidEmail($email): bool
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pwdMatch($pwd, $pwdRepeat): bool
{
   return $pwd !== $pwdRepeat;
}

function uidExists($con, $username, $email)
{
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
   $stmt = mysqli_stmt_init($con);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../signup.php?error=stmtfailed");
       exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   return mysqli_fetch_assoc($resultData) ?? false;
}

function createUser($con, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd): bool
{
    return empty($username) || empty($pwd);
}

function loginUser($con, $username, $pwd)
{
    $uidExists = uidExists($con, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../../index.php");
    }
    exit();
}
