<?php

require '../db/database.php';

if (isset($_POST['update'])) {

    $id = $_GET['bk_id'];
    $status = $_POST['status'];
    $date = date('Y-m-d', strtotime($_POST['date']));

    $sql = "SELECT bk_date FROM booking where bk_date = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0 && $status==0) {
        header("location: ../admin/admin-bookings-view.php?date-taken&bk_id=" . $_GET['bk_id']);
    } else {
        $sql = sprintf(
            "UPDATE booking SET bk_status = $status, bk_date = '$date' WHERE bk_id = $id"
        );
        mysqli_query($conn, $sql);
        header("location: ../admin/admin-bookings.php?booking_updated");
    }
} else if (isset($_POST['update-staff'])) {

    $stafflist = $_POST['staff'];
    $id = $_GET['bk_id'];

    $sql = "DELETE FROM staff_grp WHERE bk_id=$id";
    mysqli_query($conn, $sql);

    foreach ($stafflist as $value) {
        $sql = "INSERT INTO staff_grp (staff_id,bk_id) VALUES ($value,$id)";
        mysqli_query($conn, $sql);
    }

    header("location: ../admin/admin-bookings-view.php?booking_staff_updated&bk_id=" . $_GET['bk_id']);
}
