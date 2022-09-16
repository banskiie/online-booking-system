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
    header("location: ../admin/admin-bookings.php?status_update");
}
