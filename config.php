<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pitomchiki";

$GLOBALS['connection'] = mysqli_connect($hostname, $username, $password, $dbname);

if (!$GLOBALS['connection']) {
    die("Connection failed: " . mysqli_connect_error());
}