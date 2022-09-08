<?php

require '../db/database.php';
session_start();

if (isset($_POST['update'])) {

    $id = $_SESSION['id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contno = $_POST['contno'];

    $sql = sprintf(
        "UPDATE client 
    SET clnt_fn = '%s', clnt_mn = '%s', clnt_ln = '%s', 
    clnt_add = '%s', clnt_contno = '%s'
    WHERE clnt_id = $id",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($contno),
    );

    if (mysqli_query($conn, $sql)) {
        $_SESSION['first_name'] =  $first_name;
        $_SESSION['middle_name'] = $middle_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['address'] = $address;
        $_SESSION['contno'] = $contno;
        header("location: ../my_profile.php?info-updated");
    } else {
        header("location: ../my_profile.php?update_error");
    }
} else if (isset($_POST['cancel'])) {

    $id = $_GET['bkid'];
    $sql = "UPDATE booking SET bk_status = '3' WHERE bk_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ../my_bookings.php");
    } else {
        echo "error";
    }
} else if (isset($_POST['add'])) {


    $clnt_id = $_SESSION['id'];
    $name = $_POST['name'];
    $guest = $_POST['guest'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $package = $_POST['package'];
    $venue = $_POST['venue'];
    $remark = $_POST['remark'];

    $supplist = $_POST['supp'];

    $sql = sprintf(
        "INSERT INTO booking (clnt_id, pkg_id, venue_id, bk_name, bk_guest, bk_date, bk_remark) 
    VALUES ($clnt_id, $package, $venue, '%s', $guest , '$date', '$remark')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($remark)
    );
    mysqli_query($conn, $sql);

    $sql = sprintf("SELECT * FROM booking WHERE bk_name = '%s'", $conn->real_escape_string($name));
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $bkid = $row['bk_id'];

    foreach ($supplist as $value) {
        $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
        mysqli_query($conn, $sql);
    }

    header("location: ../my_bookings.php");
}
