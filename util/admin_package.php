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
        "INSERT INTO package (pkg_name, pkg_price, pkg_desc, pkg_img, pkg_status)
    VALUES ('%s', '%s', '%s', '%s', 1);",
        $conn->real_escape_string($name),
        $conn->real_escape_string($price),
        $conn->real_escape_string($desc),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act)
    VALUES ('Added New Package, %s');",
        $conn->real_escape_string($name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-packages.php?package_added");
} elseif (isset($_POST['delete'])) {
    $id = $_GET['pkg_id'];

    // Log
    $sql = sprintf("SELECT * from package WHERE pkg_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Set %s Package as Inactive');",
        $conn->real_escape_string($row['pkg_name'])
    );
    mysqli_query($conn, $sql);
    // Log

    $sql = sprintf("UPDATE package SET pkg_status=0 WHERE pkg_id = $id");
    mysqli_query($conn, $sql);

    header("location: ../admin/admin-packages.php?package_deleted");
} elseif (isset($_POST['update'])) {

    $id = $_GET['pkg_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $sql = "SELECT * FROM package WHERE pkg_id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($price != $row['pkg_price']) {
                $sql = sprintf(
                    "UPDATE package SET pkg_name='%s', pkg_price='%s', pkg_desc='%s'
                WHERE pkg_id = $id",
                    $conn->real_escape_string($name),
                    $conn->real_escape_string($price),
                    $conn->real_escape_string($desc),
                );   
                mysqli_query($conn, $sql);
                // Log
                $sql = sprintf(
                    "INSERT INTO user_log (ulog_act)
                VALUES ('Updated %s Package Info Where Price is ₱%s');",
                    $conn->real_escape_string($name),
                    $conn->real_escape_string(number_format($price, 2, '.', ','))
                );
                mysqli_query($conn, $sql);
            } else {
                $sql = sprintf(
                    "UPDATE package SET pkg_name='%s', pkg_price='%s', pkg_desc='%s'
                WHERE pkg_id = $id",
                    $conn->real_escape_string($name),
                    $conn->real_escape_string($price),
                    $conn->real_escape_string($desc),
                );   
                mysqli_query($conn, $sql);
                // Log
                $sql = sprintf(
                    "INSERT INTO user_log (ulog_act)
                VALUES ('Updated %s Package Info');",
                    $conn->real_escape_string($name),
                );
                mysqli_query($conn, $sql);
            }
        }
    }
    header("location: ../admin/admin-packages.php?package_updated");
} elseif (isset($_POST['update-pic'])) {

    $id = $_GET['pkg_id'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/package/" . $filename;

    $sql = sprintf(
        "UPDATE package SET pkg_img='%s'
    WHERE pkg_id = $id",

        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    header("location: ../admin/admin-packages.php?package_updated");
}
