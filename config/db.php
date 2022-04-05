<?php
$conf = parse_ini_file('config.ini');

$con = mysqli_connect($conf["Host"], $conf["Username"],
    $conf["Password"], $conf["Database"]);

if ($con == false) {
    echo "Can't connect to the database";
    die;
}

$con->query("
    CREATE TABLE IF NOT EXISTS categories (
        categoryid int AUTO_INCREMENT PRIMARY KEY,
        name varchar(48) NOT NULL,
        imagepath varchar(256)
    );
");
$con->query("
    CREATE TABLE IF NOT EXISTS products (
        productid int AUTO_INCREMENT PRIMARY KEY,
        name varchar(48) NOT NULL,
        description varchar(128),
        price double NOT NULL,
        vega boolean NOT NULL,
        categoryid int NOT NULL
    );
");
$con->query("
    CREATE TABLE IF NOT EXISTS users (
        usersId int AUTO_INCREMENT PRIMARY KEY,
        usersName varchar(128) NOT NULL,
        usersEmail varchar(128) NOT NULL,
        usersUid varchar(128) NOT NULL,
        usersPwd varchar(128) NOT NULL
   ); 
");