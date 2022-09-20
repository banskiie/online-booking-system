<?php

require '../db/database.php';

if (isset($_POST['update'])) {

    $id = $_GET['bk_id'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = sprintf(
        "UPDATE booking SET bk_status = $status, bk_date = '$date' WHERE bk_id = $id"
    );

    mysqli_query($conn, $sql);
    header("location: ../admin/admin-bookings.php");
} else if (isset($_POST['update-staff'])) {

    $stafflist = $_POST['staff'];
    $id = $_GET['bk_id'];

    $sql = "DELETE FROM staff_grp WHERE bk_id=$id";
    mysqli_query($conn, $sql);

    foreach ($stafflist as $value) {
        $sql = "INSERT INTO staff_grp (staff_id,bk_id) VALUES ($value,$id)";
        mysqli_query($conn, $sql);
    }

    header("location: ../admin/admin-bookings-view.php?bk_id=" . $_GET['bk_id']);
}
