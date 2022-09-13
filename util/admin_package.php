<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/package/" . $filename;

    $sql = sprintf(
        "INSERT INTO package (pkg_name, pkg_price, pkg_desc, pkg_img)
    VALUES ('%s', '%s', '%s', '%s')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($price),
        $conn->real_escape_string($desc),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);
    header("location: ../admin/admin-packages.php?package_updated");
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
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/package/" . $filename;

    $sql = sprintf(
        "UPDATE package SET pkg_name='%s', pkg_price='%s', pkg_desc='%s', pkg_img='%s'
    WHERE pkg_id = $id",
        $conn->real_escape_string($name),
        $conn->real_escape_string($price),
        $conn->real_escape_string($desc),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);
    header("location: ../admin/admin-packages.php?package_updated");
}
