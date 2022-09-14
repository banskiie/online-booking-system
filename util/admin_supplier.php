<?php

require '../db/database.php';

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $contno = $_POST['contno'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/supplier/" . $filename;

    $sql = sprintf(
        "INSERT INTO supplier (supp_name,supp_contno,supp_email,supp_role,supp_add,supp_img,supp_status)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', 1)",
        $conn->real_escape_string($name),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($email),
        $conn->real_escape_string($role),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Added New Supplier, %s As %s');",
        $conn->real_escape_string($name),
        $conn->real_escape_string($role)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-suppliers.php?supplier_added");
} elseif (isset($_POST['delete'])) {
    $id = $_GET['supp_id'];

    // Log
    $sql = sprintf("SELECT * from supplier WHERE supp_id = $id");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Set %s, %s as inactive');",
        $conn->real_escape_string($row['supp_role']),
        $conn->real_escape_string($row['supp_name'])
    );
    mysqli_query($conn, $sql);
    // Log

    $sql = sprintf("UPDATE supplier SET supp_status=0 WHERE supp_id = $id");
    mysqli_query($conn, $sql);
    header("location: ../admin/admin-suppliers.php?supplier-deleted");
} elseif (isset($_POST['update'])) {

    $id = $_GET['supp_id'];
    $name = $_POST['name'];
    $contno = $_POST['contno'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/supplier/" . $filename;

    $sql = sprintf(
        "UPDATE supplier SET supp_name='%s', supp_contno='%s', supp_email='%s', supp_role='%s', supp_add='%s', supp_img='%s'
    WHERE supp_id = $id",
        $conn->real_escape_string($name),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($email),
        $conn->real_escape_string($role),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);

    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act) VALUES ('Updated Supplier Info for %s');",
        $conn->real_escape_string($name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../admin/admin-suppliers.php?supplier_updated");
}
