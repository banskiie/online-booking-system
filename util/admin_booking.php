<?php

require '../db/database.php';
session_start();

$admin_id = $_SESSION['id'];
$admin_fn = $_SESSION['first_name'];
$admin_ln = $_SESSION['last_name'];

$id = $_GET['bk_id'];

if (isset($_POST['update'])) {

    $status = $_POST['status'];
    $venue = $_POST['venue'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    
    $supplist = $_POST['supp'];

    $sql = "SELECT bk_date FROM booking where bk_date = ? AND bk_id != ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $date, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0 && $status == 0) {
        header("location: ../admin/admin-bookings-view.php?date-taken&bk_id=$id");
    } else {
        $sql = sprintf(
            "UPDATE booking SET bk_status = $status, venue_id=$venue, bk_date = '$date' WHERE bk_id = $id"
        );
        mysqli_query($conn, $sql);

        $sql = "SELECT * FROM booking WHERE bk_id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bkid = $row['bk_id'];
                $sql = "DELETE FROM supplier_grp WHERE bk_id=$bkid";
                mysqli_query($conn, $sql);

                foreach ($supplist as $value) {
                    $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
                    mysqli_query($conn, $sql);
                }
            }
        }

        //Log
        $sql = "SELECT * FROM booking WHERE bk_id = $id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $sql = sprintf(
                "INSERT INTO user_log (ulog_act) VALUES ('Admin, %s %s, updated %s Booking');",
                $conn->real_escape_string($admin_fn),
                $conn->real_escape_string($admin_ln),
                $conn->real_escape_string($row['bk_name'])
            );
            mysqli_query($conn, $sql);
        }

        header("location: ../admin/admin-bookings-view.php?bk_id=" . $_GET['bk_id']);
    }
} else if (isset($_POST['update-staff'])) {

    $stafflist = $_POST['staff'];

    $sql = "DELETE FROM staff_grp WHERE bk_id=$id";
    mysqli_query($conn, $sql);

    foreach ($stafflist as $value) {
        $sql = "INSERT INTO staff_grp (staff_id,bk_id) VALUES ($value,$id)";
        mysqli_query($conn, $sql);
    }

    $sql = "SELECT * FROM booking WHERE bk_id = $id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $sql = sprintf(
            "INSERT INTO user_log (ulog_act) VALUES ('Admin, %s %s, updated %s Booking Staff List');",
            $conn->real_escape_string($admin_fn),
            $conn->real_escape_string($admin_ln),
            $conn->real_escape_string($row['bk_name'])
        );
        mysqli_query($conn, $sql);
    }

    header("location: ../admin/admin-bookings-view.php?booking_staff_updated&bk_id=" . $_GET['bk_id']);
}