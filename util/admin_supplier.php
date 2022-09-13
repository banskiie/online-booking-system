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
        "INSERT INTO supplier (supp_name,supp_contno,supp_email,supp_role,supp_add,supp_img)
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
        $conn->real_escape_string($name),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($email),
        $conn->real_escape_string($role),
        $conn->real_escape_string($address),
        $conn->real_escape_string($filename)
    );

    mysqli_query($conn, $sql);
    move_uploaded_file($tempname, $folder);
    header("location: ../admin/admin-suppliers.php?supplier_added");
} elseif (isset($_POST['delete'])) {

    $id = $_GET['supp_id'];
    $sql = sprintf("DELETE FROM supplier WHERE supp_id = $id");
    if (mysqli_query($conn, $sql)) {
        header("location: ../admin/admin-suppliers.php?supplier-deleted");
    } else {
        header("location: ../admin/admin-suppliers.php?supplier-not-deleted");
    }
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
    header("location: ../admin/admin-suppliers.php?supplier_updated");
}
