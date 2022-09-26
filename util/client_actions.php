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
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/client/" . $filename;

    $sql = sprintf(
        "UPDATE client 
    SET clnt_fn = '%s', clnt_mn = '%s', clnt_ln = '%s', 
    clnt_add = '%s', clnt_contno = '%s', clnt_img = '%s'
    WHERE clnt_id = $id",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($filename)
    );

    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
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

    $sql = "SELECT bk_date FROM booking where bk_date = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0) {
        header("location: ../my_bookings.php?date-taken");
    } else {
        $sql = sprintf(
            "INSERT INTO booking (clnt_id, pkg_id, venue_id, bk_name, bk_guest, bk_date, bk_remark) 
        VALUES ($clnt_id, $package, $venue, '%s', $guest , '$date', '%s')",
            $conn->real_escape_string($name),
            $conn->real_escape_string($remark)
        );
        mysqli_query($conn, $sql);

        $sql = sprintf(
            "SELECT * FROM booking WHERE bk_name = '%s' AND bk_remark = '%s'",
            $conn->real_escape_string($name),
            $conn->real_escape_string($remark)
        );
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $bkid = $row['bk_id'];

        foreach ($supplist as $value) {
            $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
            mysqli_query($conn, $sql);
        }
        header("location: ../my_bookings.php");
    }
} else if (isset($_POST['update-bk'])) {

    $clnt_id = $_SESSION['id'];
    $name = $_POST['name'];
    $guest = $_POST['guest'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $package = $_POST['package'];
    $venue = $_POST['venue'];
    $remark = $_POST['remark'];

    $supplist = $_POST['supp'];


    $sql = "SELECT bk_date FROM booking where bk_date = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0) {
        header("location: ../my_bookings.php?date-taken");
    } else {
        $sql = sprintf(
            "UPDATE booking SET clnt_id=$clnt_id, pkg_id=$package, venue_id=$venue, bk_name='%s', bk_guest=$guest, bk_date='$date', bk_remark='%s' 
    WHERE clnt_id=$clnt_id",
            $conn->real_escape_string($name),
            $conn->real_escape_string($remark)
        );
        mysqli_query($conn, $sql);

        $sql = sprintf(
            "SELECT * FROM booking WHERE bk_name = '%s' AND bk_remark = '%s'",
            $conn->real_escape_string($name),
            $conn->real_escape_string($remark)
        );
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $bkid = $row['bk_id'];

        $sql = "DELETE FROM supplier_grp WHERE bk_id=$bkid";
        mysqli_query($conn, $sql);

        foreach ($supplist as $value) {
            $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
            mysqli_query($conn, $sql);
        }
        header("location: ../my_bookings.php");
    }
}
