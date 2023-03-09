<?php

require '../db/database.php';
session_start();

if (isset($_POST['update'])) {

    $id = $_SESSION['id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contno = $_POST['contno'];

    $sql = sprintf(
        "UPDATE client SET clnt_fn = '%s', clnt_mn = '%s', clnt_ln = '%s', 
    clnt_add = '%s', clnt_contno = '%s' WHERE clnt_id = $id",
        $conn->real_escape_string($first_name),
        $conn->real_escape_string($middle_name),
        $conn->real_escape_string($last_name),
        $conn->real_escape_string($address),
        $conn->real_escape_string($contno),
    );

    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
        $_SESSION['first_name'] = $first_name;
        $_SESSION['middle_name'] = $middle_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['address'] = $address;
        $_SESSION['contno'] = $contno;

        $sql = sprintf(
            "INSERT INTO user_log (ulog_act)
        VALUES ('Client, %s %s, Updated Their Information');",
            $conn->real_escape_string($first_name),
            $conn->real_escape_string($last_name)
        );
        mysqli_query($conn, $sql);

        header("location: ../my_profile.php?info-updated");
    } else {
        header("location: ../my_profile.php?update_error");
    }
} else if (isset($_POST['update-client'])) {

    $id = $_SESSION['id'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/client/" . $filename;

    $sql = sprintf(
        "UPDATE client SET clnt_img = '%s' WHERE clnt_id = $id",
        $conn->real_escape_string($filename)
    );
    mysqli_query($conn, $sql);

    header("location: ../my_profile.php?info-updated");
} else if (isset($_POST['cancel'])) {

    $id = $_GET['bkid'];
    $sql = "UPDATE booking SET bk_status = '3' WHERE bk_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = sprintf(
            "INSERT INTO user_log (ulog_act)
        VALUES ('Client, %s %s, Cancelled Their Booking');",
            $conn->real_escape_string($_SESSION['first_name']),
            $conn->real_escape_string($_SESSION['last_name']),
        );
        mysqli_query($conn, $sql);
        header("location: ../my_bookings.php");
    } else {
        echo "error";
    }
} else if (isset($_POST['add'])) {

    $clnt_id = $_SESSION['id'];
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
        header("location: ../my_bookings.php?date-taken");
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
            $conn->real_escape_string($_SESSION['first_name']),
            $conn->real_escape_string($_SESSION['last_name'])
        );
        mysqli_query($conn, $sql);

        header("location: ../my_bookings.php");
    }
} else if (isset($_POST['update-bk'])) {

        $clnt_id = $_SESSION['id'];
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
            header("location: ../my_bookings.php?date-taken");
        } else {
            $sql = sprintf(
                "UPDATE booking SET clnt_id=$clnt_id, pkg_id=$package, venue_id=$venue, bk_name='%s', bk_guest=$guest, bk_date='$date', bk_remark='%s' 
    WHERE clnt_id=$clnt_id",
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

            $sql = "DELETE FROM supplier_grp WHERE bk_id=$bkid";
            mysqli_query($conn, $sql);

            foreach ($supplist as $value) {
                $sql = "INSERT INTO supplier_grp (supp_id,bk_id) VALUES ($value,$bkid)";
                mysqli_query($conn, $sql);

            }

            $sql = sprintf(
                "INSERT INTO user_log (ulog_act)
        VALUES ('Client, %s %s, Updated their booking, %s');",
                $conn->real_escape_string($_SESSION['first_name']),
                $conn->real_escape_string($_SESSION['last_name']),
                $conn->real_escape_string($name)
            );
            mysqli_query($conn, $sql);
            header("location: ../my_bookings.php");
        }
    
} else if (isset($_POST['add-venue'])) {
    $venue_name = $_POST['custom-venue'];
    $venue_add = $_POST['custom-add'];
    $venue_cap = $_POST['custom-cap'];
    $venue_desc = $_POST['custom-desc'];
    $status = $_SESSION['id'];
    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add, venue_cap, venue_desc, venue_status) 
    VALUES ('%s','%s','%s','%s',$status)",
        $conn->real_escape_string($venue_name),
        $conn->real_escape_string($venue_add),
        $conn->real_escape_string($venue_cap),
        $conn->real_escape_string($venue_desc)
    );
    mysqli_query($conn, $sql);
    header("location: ../my_bookings.php?venue-added");
} else if (isset($_POST['upbk-add-venue'])) {
    $venue_name = $_POST['custom-venue'];
    $venue_add = $_POST['custom-add'];
    $venue_cap = $_POST['custom-cap'];
    $venue_desc = $_POST['custom-desc'];
    $status = $_SESSION['id'];
    $sql = sprintf(
        "INSERT INTO venue (venue_name, venue_add, venue_cap, venue_desc, venue_status) 
    VALUES ('%s','%s','%s','%s',$status)",
        $conn->real_escape_string($venue_name),
        $conn->real_escape_string($venue_add),
        $conn->real_escape_string($venue_cap),
        $conn->real_escape_string($venue_desc)
    );
    mysqli_query($conn, $sql);
    header("location: ../my_bookings_update.php?venue-added");
} else if (isset($_POST['add-supp'])) {
    $status = $_SESSION['id'];
    $supp_name = $_POST['custom-supp'];
    $supp_role = $_POST['custom-role'];
    $sql = sprintf(
        "INSERT INTO supplier (supp_name,supp_role,supp_status) 
    VALUES ('%s','%s',$status)",
        $conn->real_escape_string($supp_name),
        $conn->real_escape_string($supp_role)
    );
    mysqli_query($conn, $sql);
    header("location: ../my_bookings.php?supplier-added");
} else if (isset($_POST['upbk-add-supp'])) {
    $status = $_SESSION['id'];
    $supp_name = $_POST['custom-supp'];
    $supp_role = $_POST['custom-role'];
    $sql = sprintf(
        "INSERT INTO supplier (supp_name,supp_role,supp_status) 
    VALUES ('%s','%s',$status)",
        $conn->real_escape_string($supp_name),
        $conn->real_escape_string($supp_role)
    );
    mysqli_query($conn, $sql);
    header("location: ../my_bookings_update.php?supplier-added");
}

if (isset($_POST['xb'])) {
    $status = $_SESSION['id'];
    $sql = "UPDATE venue SET venue_status=0 WHERE venue_status=$status";
    mysqli_query($conn, $sql);
    header("location: ../my_bookings.php");
}

if (isset($_POST['xu'])) {
    $status = $_SESSION['id'];
    $sql = "UPDATE venue SET venue_status=0 WHERE venue_status=$status";
    mysqli_query($conn, $sql);
    header("location: ../my_bookings_update.php");
}