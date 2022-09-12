<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];

    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add)
    VALUES ('%s', '%s')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($address),
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-venues.php?venue-added");
    } else {
        header("location: ../admin/admin-venues.php?venue-not-added");
    }

}

if (isset($_POST['delete'])) {

    $id = $_GET['venue_id'];
    $sql = sprintf("DELETE FROM venue WHERE venue_id = $id");
    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-venues.php?venue-deleted");
    } else {
        header("location: ../admin/admin-venues.php?venue-not-deleted");
    }

}

elseif (isset($_POST['update'])) {

    $id = $_GET['venue_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    $sql = sprintf(
        "UPDATE venue SET venue_name='%s', venue_add='%s'
    WHERE venue_id = $id",
        $conn->real_escape_string($name),
        $conn->real_escape_string($address),
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-venues.php?venue_updated");
    } else {
        header("location: ../admin/admin-venues.php?venue_not_updated");
    }

}