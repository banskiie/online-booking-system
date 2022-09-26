<?php
require '../db/database.php';

if (isset($_POST['update'])) {

    $id = $_GET['text_id'];
    $home = $_POST['home'];
    $about = $_POST['about'];
    $team = $_POST['team'];
    $service = $_POST['service'];

    $sql = sprintf(
        "UPDATE text SET text_home='%s', text_about='%s', text_team='%s', text_service='%s'
    WHERE text_id = $id",
        $conn->real_escape_string($home),
        $conn->real_escape_string($about),
        $conn->real_escape_string($team),
        $conn->real_escape_string($service)
    );

    mysqli_query($conn, $sql);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Updated Page Texts');",
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-pages.php?pages_updated");
}
