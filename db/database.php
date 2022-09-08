<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "yani_db";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Connection not established!");
}
