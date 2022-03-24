<?php
function createProduct($con, $name, $description, $price, $vega, $categoryid)
{
    $sql = "INSERT INTO products (name, description, price, vega, categoryid) VALUES(?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:create.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssss", $name, $description, $price, $vega, $categoryid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:create.php?error=none");
    exit();
}
function emptyInputCreate($name, $price, $categoryid)
{
    return empty($name) || empty($price) || empty($categoryid);
}

function nameExists($con, $name)
{
    $sql = "SELECT * FROM products WHERE name = ?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:create.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
