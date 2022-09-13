<?php
require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/venue/" . $filename;

    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add, venue_img)
    VALUES ('%s', '%s', '%s')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);
    header("location: ../admin/admin-venues.php?venue_added");
} elseif (isset($_POST['delete'])) {

    $id = $_GET['venue_id'];
    $sql = sprintf("DELETE FROM venue WHERE venue_id = $id");
    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-venues.php?venue-deleted");
    } else {
        header("location: ../admin/admin-venues.php?venue-not-deleted");
    }
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
    header("location: ../admin/admin-venues.php?venue_updated");
}
