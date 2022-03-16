<?php
$conf["Username"]= 'root';
$conf["Password"]= '';
$conf["Host"]= 'localhost';
$conf["Database"]= 'pizza';

$con = mysqli_connect($conf["Host"], $conf["Username"],
    $conf["Password"], $conf["Database"]);

if ($con == false) {
    echo "Can't connect to the database";
}
