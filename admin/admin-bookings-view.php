<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content bkview">
        <div id="view-window" class="bkview2">
            <?php     
                $id = $_GET['bk_id'];
                $sql = "SELECT * FROM booking 
                INNER JOIN venue ON booking.venue_id = venue.venue_id 
                INNER JOIN package ON booking.pkg_id = package.pkg_id
                INNER JOIN client on booking.clnt_id = client.clnt_id
                WHERE bk_id = $id";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <p>From: <?php echo $row['clnt_ln']; ?>, <?php echo $row['clnt_fn']; ?> <?php echo $row['clnt_mn']; ?> (<?php echo $row['clnt_email']; ?>) </p>
                    <p>Name: <strong><?php echo $row['bk_name']; ?></strong></p>
                    <p>Package: <strong><?php echo $row['pkg_name']; ?></strong></p>
                    <p>Number of Guests: <strong><?php echo $row['bk_guest']; ?></strong></h1>

                    <p>Suppliers: <?php $sql2 = "SELECT * FROM supplier_grp INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id WHERE bk_id = $id and supp_status=1";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) { ?>
                                <br><span><b><?php echo $row2['supp_name']; ?></b></span>
                            <?php }
                                    } else { ?> <span><i>None</i></span> <?php } ?>
                    </p>
                    <p>Venue: <strong><?php echo $row['venue_name']; ?></strong></p>
                    <p>Staff: <?php $sql2 = "SELECT * FROM staff_grp INNER JOIN staff ON staff.staff_id = staff_grp.staff_id WHERE bk_id = $id";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    while ($row2 = $result2->fetch_assoc()) { ?>
                                <br><span><b><?php echo $row2['staff_fn'] . " " . $row2['staff_ln']; ?></b></span>
                            <?php }
                                } else { ?> <br><span><b><i>None</i></b></span> <?php } ?>
                    </p>
                    <p id="remark">Remark: <br>
                        <i><?php echo $row['bk_remark']; ?></i>
                    </p>
                    <form action="../util/admin_booking.php?bk_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-comp">
                            <label class="label">Date</label>
                            <input type="date" name="date" value="<?php echo $row['bk_date']; ?>" required>
                        </div>

                        <label>Status: </label>
                        <select name="status" required>
                            <option disabled selected value style="display:none"><?php if ($row['bk_status'] == 0) {
                                                                                        echo "Pending";
                                                                                    } else if ($row['bk_status'] == 1) {
                                                                                        echo "Scheduled";
                                                                                    } else if ($row['bk_status'] == 2) {
                                                                                        echo "Finished";
                                                                                    } else if ($row['bk_status'] == 3) {
                                                                                        echo "Cancelled";
                                                                                    } ?></option>
                            <option value="0">Pending</option>
                            <option value="1">Scheduled</option>
                            <option value="2">Finished</option>
                            <option value="3">Cancelled</option>
                        </select>
                        <button id="update" name="update">Update</button>
                    </form>
            <?php }
             ?>
            <div id="button-grp">
                <a href="admin-bookings.php"><button id="back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div>
            <form id="bk-staff" action="../util/admin_booking.php?bk_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <p class="label">Staff</p>
                <div id="staff-checklist">
                    <?php
                    $sql = "SELECT * FROM staff WHERE staff_status=1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div>
                                <input type="checkbox" name="staff[ ]" value="<?php echo $row['staff_id']; ?>"><?php echo $row['staff_fn'] . " " . $row['staff_ln'] . " - <i>" . $row['staff_pos'] . "</i>"; ?><br />
                            </div>
                    <?php }
                    } ?>
                </div>
                <button id="staff-btn" name="update-staff">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Update Staff</button>
            </form>
        </div>

    </main>
    </div>
</body>

</html>