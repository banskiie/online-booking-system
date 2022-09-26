<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $first_name = $_POST['fn'];
    $middle_name = $_POST['mn'];
    $last_name = $_POST['ln'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        header("location: ../admin/admin-admin-add.php?password_not_the_same");
    } else {
        $sql = "SELECT admin_email FROM admin where admin_email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../admin/admin-admin-add.php?sql_error");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount > 0) {
                header("Location: ../admin/admin-admin-add.php?email_already_taken");
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = sprintf(
                    "INSERT INTO admin (admin_fn, admin_mn, admin_ln, admin_email, admin_contno, admin_pass, admin_status)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', 1)",
                    $conn->real_escape_string($first_name),
                    $conn->real_escape_string($middle_name),
                    $conn->real_escape_string($last_name),
                    $conn->real_escape_string($email),
                    $conn->real_escape_string($contno),
                    $conn->real_escape_string($hashed_password)
                );
                mysqli_query($conn, $sql);
                // Log
                $sql = sprintf(
                    "INSERT INTO user_log (ulog_act) VALUES ('Added New Admin, %s %s');",
                    $conn->real_escape_string($first_name),
                    $conn->real_escape_string($last_name)
                );
                mysqli_query($conn, $sql);
                // Log
                header("location: ../admin/admin-admin.php?admin_added");
            }
        }
    }
} elseif (isset($_POST['delete'])) {

    $id = $_GET['admin_id'];

    // Log
    $sql = sprintf("SELECT * from admin WHERE admin_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Set Admin, %s %s As Inactive');",
        $conn->real_escape_string($row['admin_fn']),
        $conn->real_escape_string($row['admin_ln']),
    );
    mysqli_query($conn, $sql);
    // Log

    $sql = sprintf("UPDATE admin SET admin_status=0 WHERE admin_id = $id");
    mysqli_query($conn, $sql);

    header("location: ../admin/admin-admin.php?admin-deleted");
} elseif (isset($_POST['update'])) {

    $id = $_GET['admin_id'];
    $first_name = $_POST['fn'];
    $middle_name = $_POST['mn'];
    $last_name = $_POST['ln'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];

    $sql = "SELECT admin_email FROM admin where admin_email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../admin/admin-admin-edit.php?sql_error&admin_id=" . $_GET['admin_id']);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0) {
            header("location:../admin/admin-admin-edit.php?email_already_taken&admin_id=" . $_GET['admin_id']);
        } else {
            $sql = sprintf(
                "UPDATE admin SET admin_fn='%s', admin_mn='%s', admin_ln='%s', admin_email='%s', admin_contno='%s'
    WHERE admin_id = $id",
                $conn->real_escape_string($first_name),
                $conn->real_escape_string($middle_name),
                $conn->real_escape_string($last_name),
                $conn->real_escape_string($email),
                $conn->real_escape_string($contno),
            );
            mysqli_query($conn, $sql);
            // Log
            $sql = sprintf(
                "INSERT INTO user_log (ulog_act) VALUES ('Updated Information for Admin Member, %s %s');",
                $conn->real_escape_string($first_name),
                $conn->real_escape_string($last_name)
            );
            mysqli_query($conn, $sql);
            // Log
            header("location: ../admin/admin-admin.php?admin_updated");
        }
    }
}
