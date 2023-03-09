<?php

require '../db/database.php';

if (isset($_POST['book'])) {

    // Registration
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];

    if ($pass !== $conf_pass) {
        header("location: ../book-now.php?pass-not-the-same");
    } else {
        $sql = "SELECT clnt_email FROM client where clnt_email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../book-now.php?error");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);
            if ($rowCount > 0) {
                header("Location: ../book-now.php?email-taken");
            } else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = sprintf(
                    "INSERT INTO client 
            (clnt_fn, clnt_ln, clnt_email, clnt_pass) 
            VALUES ('%s','%s','%s','%s')",
                    $conn->real_escape_string($fn),
                    $conn->real_escape_string($ln),
                    $conn->real_escape_string($email),
                    $conn->real_escape_string($hash),
                );
                if (mysqli_query($conn, $sql)) {
                    // Log
                    $sql = sprintf(
                        "INSERT INTO user_log (ulog_act) VALUES ('Registered %s %s as New Client');",
                        $conn->real_escape_string($fn),
                        $conn->real_escape_string($ln)
                    );
                    mysqli_query($conn, $sql);

                } else {
                    header("location: ../book-now.php?error");
                }
            }
        }
    }

    // Booking

    $sql = "SELECT * FROM client WHERE clnt_email = '$email'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {

        $clnt_id = $row['clnt_id'];
        $name = $_POST['name'];
        $guest = $_POST['guest'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $package = $_POST['package'];
        $venue = $_POST['venue'];
        $remark = $_POST['remark'];

        $supplist = $_POST['supp'];

        $sql = "SELECT bk_date FROM booking where bk_date = ? AND clnt_id != ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $date, $clnt_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0) {
            header("location: ../book-now.php?date-taken");
        } else {
            $sql = sprintf(
                "INSERT INTO booking (clnt_id, pkg_id, venue_id, bk_name, bk_guest, bk_date, bk_remark) 
        VALUES ($clnt_id, $package, $venue, '%s', $guest , '$date', '%s')",
                $conn->real_escape_string($name),
                $conn->real_escape_string($remark)
            );
            mysqli_query($conn, $sql);

            $sql = sprintf(
                "SELECT * FROM booking WHERE bk_name = '%s' AND bk_remark = '%s'",
                $conn->real_escape_string($name),
                $conn->real_escape_string($remark)
            );
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $bkid = $row['bk_id'];

            foreach ($supplist as $value) {
                $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
                mysqli_query($conn, $sql);
            }

            $sql = sprintf(
                "INSERT INTO user_log (ulog_act)
        VALUES ('Client, %s %s, Added A New Booking')",
                $conn->real_escape_string($fn),
                $conn->real_escape_string($ln)
            );
            mysqli_query($conn, $sql);

            $sql = sprintf(
                "UPDATE venue SET venue_status='%s' WHERE venue_status=99999",
                $conn->real_escape_string($clnt_id),
            );
            mysqli_query($conn, $sql);

            $sql = sprintf(
                "UPDATE supplier SET supp_status='%s' WHERE supp_status=99999",
                $conn->real_escape_string($clnt_id),
            );
            mysqli_query($conn, $sql);

            header("location: ../index.php?booking-sent");
        }
    }

}

if (isset($_POST['add-venue'])) {
    $status = 99999;
    $venue_name = $_POST['custom-venue'];
    $venue_add = $_POST['custom-add'];
    $venue_cap = $_POST['custom-cap'];
    $venue_desc = $_POST['custom-desc'];
    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add, venue_cap, venue_desc, venue_status) 
    VALUES ('%s','%s','%s','%s',$status)",
        $conn->real_escape_string($venue_name),
        $conn->real_escape_string($venue_add),
        $conn->real_escape_string($venue_cap),
        $conn->real_escape_string($venue_desc)
    );
    mysqli_query($conn, $sql);
    header("location: ../book-now.php?venue-added");
}

if (isset($_POST['add-supp'])) {
    $status = 99999;
    $supp_name = $_POST['custom-supp'];
    $supp_role = $_POST['custom-role'];
    $sql = sprintf(
        "INSERT INTO supplier (supp_name,supp_role,supp_status) 
    VALUES ('%s','%s', $status)",
        $conn->real_escape_string($supp_name),
        $conn->real_escape_string($supp_role)
    );
    mysqli_query($conn, $sql);
    header("location: ../book-now.php?supplier-added");
}

if (isset($_POST['cancel'])) {
    $sql = "DELETE FROM supplier WHERE supp_status=99999";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM venue WHERE venue_status=99999";
    mysqli_query($conn, $sql);
    header("location: ../index.php");
}


?>