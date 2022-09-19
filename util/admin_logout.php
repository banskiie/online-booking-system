<?php
require "../db/database.php";
session_start();
if (isset($_SESSION["role"]) == "admin") {
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Admin Log Out')"
    );
    mysqli_query($conn, $sql);
}
session_destroy();
header('Location: ../index.php');

