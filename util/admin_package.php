<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $sql = sprintf(
        "INSERT INTO package (pkg_name, pkg_price, pkg_desc)
    VALUES ('%s', '%s', '%s')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($price),
        $conn->real_escape_string($desc),
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-packages.php?package-sent");
    } else {
        header("location: ../admin/admin-packages.php?package-not-sent");
    }
} elseif (isset($_POST['delete'])) {
    $id = $_GET['pkg_id'];
    $sql = sprintf("DELETE FROM package WHERE pkg_id = $id");
    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-packages.php?package-deleted");
    } else {
        header("location: ../admin/admin-packages.php?package-not-deleted");
    }
} elseif (isset($_POST['update'])) {
    $id = $_GET['pkg_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $sql = sprintf(
        "UPDATE package SET pkg_name='%s', pkg_price='%s', pkg_desc='%s'
    WHERE pkg_id = $id",
        $conn->real_escape_string($name),
        $conn->real_escape_string($price),
        $conn->real_escape_string($desc),
    );

    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-packages.php?package_updated");
    } else {
        header("location: ../admin/admin-packages.php?package_not_updated");
    }
}
