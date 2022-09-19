<?php

require '../db/database.php';

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];
    $remark = $_POST['remark'];

    $sql = sprintf(
        "INSERT INTO inquiry (inq_name, inq_email, inq_contno, inq_remark, inq_status)
    VALUES ('%s', '%s', '%s', '%s', 0)",
        $conn->real_escape_string($name),
        $conn->real_escape_string($email),
        $conn->real_escape_string($contno),
        $conn->real_escape_string($remark)
    );
    mysqli_query($conn, $sql);
    // Log
    $sql = sprintf(
        "INSERT INTO user_log (ulog_act)
    VALUES ('New inquiry from %s');",
        $conn->real_escape_string($name)
    );
    mysqli_query($conn, $sql);
    // Log

    header("location: ../contact.php?inquiry-sent");
} else if (isset($_POST['register'])) {

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contno = $_POST['contno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/client/" . $filename;

    if ($password !== $confirm_password) {
        header("location: ../register.php?password_not_the_same");
    } else {
        $sql = "SELECT clnt_email FROM client where clnt_email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?sql_error");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount > 0) {
                header("Location: ../register.php?email_already_taken");
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = sprintf(
                    "INSERT INTO client 
                (clnt_fn, clnt_mn, clnt_ln, clnt_add, clnt_contno, clnt_email, clnt_pass, clnt_img) 
                VALUES ('%s','%s','%s','%s','%s','%s','%s', '%s')",
                    $conn->real_escape_string($first_name),
                    $conn->real_escape_string($middle_name),
                    $conn->real_escape_string($last_name),
                    $conn->real_escape_string($address),
                    $conn->real_escape_string($contno),
                    $conn->real_escape_string($email),
                    $conn->real_escape_string($hashed_password),
                    $conn->real_escape_string($filename)
                );
                if (mysqli_query($conn, $sql)) {
                    move_uploaded_file($tempname, $folder);
                    // Log
                    $sql = sprintf(
                        "INSERT INTO user_log (ulog_act) VALUES ('Registered %s %s as New Client');",
                        $conn->real_escape_string($first_name),
                        $conn->real_escape_string($last_name)
                    );
                    mysqli_query($conn, $sql);
                    // Log
                    header("Location: ../register.php?success");
                } else {
                    header("location: ../register.php?sql_error");
                }
            }
        }
    }
} else if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM client WHERE clnt_email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?sql_error");
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $passCheck = password_verify($password, $row['clnt_pass']);
            if ($passCheck == false) {
                header("Location: ../login.php?invalid_credentials");
            } else if ($passCheck == true) {
                session_start();
                $_SESSION['id'] = $row['clnt_id'];
                $_SESSION['first_name'] = $row['clnt_fn'];
                $_SESSION['middle_name'] = $row['clnt_mn'];
                $_SESSION['last_name'] = $row['clnt_ln'];
                $_SESSION['address'] = $row['clnt_add'];
                $_SESSION['contno'] = $row['clnt_contno'];
                $_SESSION['email'] = $row['clnt_email'];
                $_SESSION['password'] = $row['clnt_pass'];
                $_SESSION['loggedIn'] = true;
                $_SESSION['role'] = "client";
                $sql = sprintf(
                    "INSERT INTO user_log (ulog_act) VALUES ('Client, %s %s, Logged In');",
                    $conn->real_escape_string($row['clnt_fn']),
                    $conn->real_escape_string($row['clnt_ln'])
                );
                mysqli_query($conn, $sql);
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php?invalid_credentials");
            }
        } else {
            $sql = "SELECT * FROM admin WHERE admin_email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../login.php?sql_error");
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $passCheck = password_verify($password, $row['admin_pass']);
                    if ($passCheck == false) {
                        header("Location: ../login.php?invalid_credentials");
                    } elseif ($passCheck == true) {
                        session_start();
                        ini_set('session.gc_maxlifetime', 3600);
                        session_set_cookie_params(3600);
                        $_SESSION['id'] = $row['admin_id'];
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['role'] = 'admin';
                        $sql = sprintf(
                            "INSERT INTO user_log (ulog_act) VALUES ('Admin Log In')"
                        );
                        mysqli_query($conn, $sql);
                        header("Location: ../admin/admin-dash.php");
                    } else {
                        header("Location: ../login.php?invalid_credentials");
                    }
                } else {
                    header("location: ../login.php?no_user");
                }
            }
        }
    }
} else {
    header("Location: ../login.php?no_user");
}
