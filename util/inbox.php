<?php

require '../db/database.php';
session_start();

if (isset($_POST['send'])) {

    $id = $_GET['id'];
    $msg = $_POST['msg'];

    $sql = "SELECT * FROM client WHERE clnt_id = $id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {

        $email = $row['clnt_email'];
        $fn = $row['clnt_fn'];
        $ln = $row['clnt_ln'];

        $sql = sprintf(
            "INSERT INTO inbox (clnt_id, clnt_email, inbox_text)
        VALUES ('%s', '%s', '[%s] %s')",
            $conn->real_escape_string($id),
            $conn->real_escape_string($email),
            $conn->real_escape_string($fn),
            $conn->real_escape_string($msg)
        );
        mysqli_query($conn, $sql);

        // Log
        $sql = sprintf(
            "INSERT INTO user_log (ulog_act)
        VALUES ('New inbox message from %s %s');",
            $conn->real_escape_string($fn),
            $conn->real_escape_string($ln)
        );
        mysqli_query($conn, $sql);

        header("location: ../my_inbox.php");
    }
}

if (isset($_POST['send-admin'])) {

    $clnt_id = $_GET['clnt_id'];
    $msg = $_POST['msg'];

    $admin_id = $_SESSION['id'];
    $admin_fn = $_SESSION['first_name'];
    $admin_ln = $_SESSION['last_name'];

    $sql = "SELECT * FROM client WHERE clnt_id = $clnt_id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {

        $clnt_email = $row['clnt_email'];
        $clnt_fn = $row['clnt_fn'];
        $clnt_ln = $row['clnt_ln'];

        $sql = sprintf(
            "INSERT INTO inbox (clnt_id, clnt_email, admin_id, inbox_text, inbox_status)
        VALUES ('%s', '%s', '%s', '[Admin %s] %s', 1)",
            $conn->real_escape_string($clnt_id),
            $conn->real_escape_string($clnt_email),
            $conn->real_escape_string($admin_id),
            $conn->real_escape_string($admin_fn),
            $conn->real_escape_string($msg)
        );
        mysqli_query($conn, $sql);

        // Log
        $sql = sprintf(
            "INSERT INTO user_log (ulog_act)
        VALUES ('Admin %s %s responded to a message from Client %s %s');",
            $conn->real_escape_string($admin_fn),
            $conn->real_escape_string($admin_ln),
            $conn->real_escape_string($clnt_fn),
            $conn->real_escape_string($clnt_ln)
        );
        mysqli_query($conn, $sql);

        header("location: ../admin/admin-inbox.php");
    }
}
?>