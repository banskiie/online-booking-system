<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $first_name = $_POST['fn'];
    $middle_name = $_POST['mn'];
    $last_name = $_POST['ln'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/staff/" . $filename;

    $sql = sprintf(
        "INSERT INTO staff (staff_fn, staff_mn, staff_ln, staff_email, staff_contno, staff_add, staff_pos, staff_img, staff_status)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 1)",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($email),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($address),
        $conn->real_escape_string($position),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Added New Staff Member, %s %s');",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($last_name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-staff.php?staff_added");
} elseif (isset($_POST['delete'])) {

    $id = $_GET['staff_id'];

    // Log
    $sql = sprintf("SELECT * from staff WHERE staff_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Set %s, %s %s As Inactive');",
        $conn->real_escape_string($row['staff_pos']),
        $conn->real_escape_string($row['staff_fn']),
        $conn->real_escape_string($row['staff_ln']),
    );
    mysqli_query($conn, $sql);
    // Log

    $sql = sprintf("UPDATE staff SET staff_status=0 WHERE staff_id = $id");
    mysqli_query($conn, $sql);

    header("location: ../admin/admin-staff.php?staff_deleted");
} elseif (isset($_POST['update'])) {

    $id = $_GET['staff_id'];
    $first_name = $_POST['fn'];
    $middle_name = $_POST['mn'];
    $last_name = $_POST['ln'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];
    $address = $_POST['address'];
    $position = $_POST['position'];

    $sql = sprintf(
        "UPDATE staff SET staff_fn='%s', staff_mn='%s', staff_ln='%s', staff_email='%s', staff_contno='%s', staff_add='%s', staff_pos='%s'
    WHERE staff_id = $id",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($email),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($address),
        $conn->real_escape_string($position),
    );
    mysqli_query($conn, $sql);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Updated Information for Staff Member, %s %s');",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($last_name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-staff.php?staff_updated");
} elseif (isset($_POST['update-pic'])) {

    $id = $_GET['staff_id'];
    $name = $_POST['fn'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/staff/" . $filename;

    $sql = sprintf(
        "UPDATE staff SET staff_img='%s'
    WHERE staff_id = $id",
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    header("location: ../admin/admin-staff.php?staff_updated");
} 
