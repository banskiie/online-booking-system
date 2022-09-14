<?php

require '../db/database.php';

if (isset($_POST['update'])) {

    $id = $_GET['bk_id'];
    $status = $_POST['status'];

    $sql = sprintf(
        "UPDATE booking SET bk_status = $status WHERE bk_id = $id"
    );

    mysqli_query($conn, $sql);
    header("location: ../admin/admin-bookings.php?status_update");
}
