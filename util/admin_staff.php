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

    $sql = sprintf(
        "INSERT INTO staff (staff_fn, staff_mn, staff_ln, staff_email, staff_contno, staff_add, staff_pos)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($email),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($address),
        $conn->real_escape_string($position)
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-staff.php?staff-added");
    } else {
        header("location: ../admin/admin-staff.php?staff-not-added");
    }
} elseif (isset($_POST['delete'])) {

    $id = $_GET['staff_id'];
    $sql = sprintf("DELETE FROM staff WHERE staff_id = $id");
    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-staff.php?staff-deleted");
    } else {
        header("location: ../admin/admin-staff.php?staff-not-deleted");
    }
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
        $conn->real_escape_string($position)
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-staff.php?staff_updated");
    } else {
        header("location: ../admin/admin-staff.php?staff_not_updated");
    }
}
