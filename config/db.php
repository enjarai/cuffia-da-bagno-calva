<?php
$conf = parse_ini_file('config.ini');

$con = mysqli_connect($conf["Host"], $conf["Username"],
    $conf["Password"], $conf["Database"]);

if ($con == false) {
    echo "Can't connect to the database";
}

mysqli_query($con, "
    CREATE TABLE IF NOT EXISTS Categories (
        categoryid int AUTO_INCREMENT PRIMARY KEY,
        name varchar(48) NOT NULL,
        imagepath varchar(256)
    );
    CREATE TABLE IF NOT EXISTS Products (
        productid int AUTO_INCREMENT PRIMARY KEY,
        name varchar(48) NOT NULL,
        description varchar(128),
        price double NOT NULL,
        vega boolean NOT NULL,
        categoryid int NOT NULL
    );
");