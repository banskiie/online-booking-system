<?php
require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/venue/" . $filename;

    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add, venue_img, venue_status)
    VALUES ('%s', '%s', '%s', 1)",
        $conn->real_escape_string($name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Added New Venue, %s');",
        $conn->real_escape_string($name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-venues.php?venue_added");
} elseif (isset($_POST['delete'])) {
    $id = $_GET['venue_id'];

    // Log
    $sql = sprintf("SELECT * from venue WHERE venue_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Set %s Venue as Inactive');",
        $conn->real_escape_string($row['venue_name'])
    );
    mysqli_query($conn, $sql);
    // Log

    $sql = sprintf("UPDATE venue SET venue_status=0 WHERE venue_id = $id");
    mysqli_query($conn, $sql);
    header("location: ../admin/admin-venues.php?venue-deleted");
} elseif (isset($_POST['update'])) {

    $id = $_GET['venue_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/venue/" . $filename;

    $sql = sprintf(
        "UPDATE venue SET venue_name='%s', venue_add='%s', venue_img='%s'
    WHERE venue_id = $id",
        $conn->real_escape_string($name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Updated Venue Info for %s');",
        $conn->real_escape_string($name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-venues.php?venue_updated");
} 
