<?php
require "../db/database.php";
session_start();
if (isset($_SESSION["role"]) == "admin") {
    $id = $_SESSION['id'];
    $sql = sprintf("SELECT * from admin WHERE admin_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Admin, %s %s, Log Out')",
        $conn->real_escape_string($row['admin_fn']),
        $conn->real_escape_string($row['admin_ln'])
    );
    mysqli_query($conn, $sql);
}
session_destroy();
header('Location: ../index.php');

