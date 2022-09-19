<?php
require "../db/database.php";
if (isset($_SESSION["role"]) == "client") {
    $id = $_SESSION['id'];
    $sql = sprintf("SELECT * from client WHERE clnt_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Client, %s %s, Log Out')",
        $conn->real_escape_string($row['clnt_fn']),
        $conn->real_escape_string($row['clnt_ln'])
    );
    mysqli_query($conn, $sql);
}
session_destroy();
header('Location: ../index.php');
