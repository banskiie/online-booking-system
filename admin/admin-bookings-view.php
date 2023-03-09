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
    <?php if (isset($_GET['date-taken'])) {
        echo '<script>alert("Date Already Booked/Taken!")</script>';
    } else if (isset($_GET['booking_staff_updated'])) {
        echo '<script>alert("Booking Staff Updated")</script>';
    } ?>
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
                <p>From:
                    <?php echo $row['clnt_ln']; ?>,
                    <?php echo $row['clnt_fn']; ?>
                    <?php echo $row['clnt_mn']; ?>
                    (
                    <?php echo $row['clnt_email']; ?>)
                </p>
                <p>Name: <strong>
                        <?php echo $row['bk_name']; ?>
                    </strong></p>
                <p>Package: <strong>
                        <?php echo $row['pkg_name']; ?>
                    </strong></p>
                <p>Number of Guests: <strong>
                        <?php echo $row['bk_guest']; ?>
                    </strong></h1>

                <p>Suppliers:
                    <?php $sql2 = "SELECT * FROM supplier_grp INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id WHERE bk_id = $id";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) { ?>
                            <br><span><b>
                                    <?php echo $row2['supp_name']; ?>
                                </b></span>
                        <?php }
                    } else { ?> <span><i>None</i></span>
                    <?php } ?>
                </p>
                <p>Venue: <strong>
                        <?php if (!empty($row['venue_name'])) {
                            echo $row['venue_name'];
                        } else {
                            echo "None";
                        } ?>
                    </strong></p>
                <p>Staff:
                    <?php $sql2 = "SELECT * FROM staff_grp INNER JOIN staff ON staff.staff_id = staff_grp.staff_id WHERE bk_id = $id";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) { ?>
                            <br><span><b>
                                    <?php echo $row2['staff_fn'] . " " . $row2['staff_ln']; ?>
                                </b></span>
                        <?php }
                    } else { ?> <br><span><b><i>None</i></b></span>
                    <?php } ?>
                </p>
                <p id="remark">Remark: <br>
                    <i>
                        <?php echo $row['bk_remark']; ?>
                    </i>
                </p>
                <form action="../util/admin_booking.php?bk_id=<?php echo $id; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-comp">
                        <label class="label">Date</label>
                        <input type="date" name="date" value="<?php echo $row['bk_date']; ?>"
                            min="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    <label>Status: </label>
                    <select name="status" required>
                        <option selected value="<?php echo $row['bk_status']; ?>">
                            <?php if ($row['bk_status'] == 0) {
                                echo "Pending";
                            } else if ($row['bk_status'] == 1) {
                                echo "Scheduled";
                            } else if ($row['bk_status'] == 2) {
                                echo "Finished";
                            } else if ($row['bk_status'] == 3) {
                                echo "Cancelled";
                            } ?>
                        </option>
                        <option value="0">Pending</option>
                        <option value="1">Scheduled</option>
                        <option value="2">Finished</option>
                        <option value="3">Cancelled</option>
                    </select>
                    <div class="form-comp option">
                        <label class="label">Venue</label>
                        <select id="venue" name="venue">
                            <?php
                            $clnt_id = $row['clnt_id'];
                            $venue_id = $row['venue_id'];
                            $sql = "SELECT * FROM venue WHERE venue_status=1 OR venue_status=$clnt_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($venue_id == $row['venue_id']) { ?>
                                        <option value="<?php echo $row['venue_id']; ?>"
                                            title="<?php echo $row['venue_add']; ?> - <?php echo $row['venue_desc']; ?>" selected><?php
                                                   echo $row['venue_name']; ?> (<?php echo $row['venue_cap']; ?> pax)</option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row['venue_id']; ?>"
                                            title="<?php echo $row['venue_add']; ?> - <?php echo $row['venue_desc']; ?>"><?php echo $row['venue_name']; ?> (<?php echo $row['venue_cap']; ?> pax)</option>
                                    <?php }
                                }
                            } ?>
                        </select>
                    </div>
                    <?php $sql = "SELECT * FROM booking
                        INNER JOIN venue ON booking.venue_id = venue.venue_id
                        INNER JOIN package ON booking.pkg_id = package.pkg_id
                        INNER JOIN supplier_grp ON supplier_grp.bk_id = booking.bk_id
                        INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id
                        WHERE clnt_id = $clnt_id";

                    $result = $conn->query($sql);
                    $supp_grp = array();
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($supp_grp, $row["supp_id"]);
                    } ?>
                    <div>
                        <label class="label">Suppliers</label>
                        <div class="supp-grp">
                        <div id="supp-checklist">
                            <span><b>Digital Services</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Photography' OR supp_role = 'Videography'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Food and Pastries</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Food Catering' OR supp_role = 'Dessert and Pastries'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Stylists</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Stylist'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>HMUA</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1  AND supp_role = 'HMUA'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>DJ and Hosting</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1  AND supp_role = 'DJ' OR supp_role = 'Emcee'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Custom by Client</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=$clnt_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $supp_id = $row['supp_id'];
                                    if (in_array($supp_id, $supp_grp)) { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>" checked><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php } else { ?>
                                        <div>
                                            <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php
                                               echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                        </div>
                                    <?php }
                                }
                            } ?>
                        </div>
                        </div>
                    </div>
                    <button id="update" name="update">Update</button>
                </form>
            <?php }
            ?>
            <div id="button-grp">
                <a href="admin-bookings.php"><button id="back">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </button>
                </a>
            </div>



        </div>
        <div>
            <form id="bk-staff" action="../util/admin_booking.php?bk_id=<?php echo $id; ?>" method="post"
                enctype="multipart/form-data">
                <p class="label">Staff</p>
                <div id="staff-checklist">
                    <?php
                    //Staff Array
                    $sql = "SELECT * FROM staff 
                            INNER JOIN staff_grp ON staff.staff_id = staff_grp.staff_id 
                            INNER JOIN booking ON staff_grp.bk_id = booking.bk_id
                            WHERE clnt_id=$clnt_id";
                    $result = $conn->query($sql);
                    $staff_grp = array();

                    $sql = "SELECT * FROM staff WHERE staff_status=1";
                    while ($row = mysqli_fetch_array($result)) {
                            array_push($staff_grp, $row["staff_id"]);
                        }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $staff_id = $row['staff_id'];
                            if (in_array($staff_id, $staff_grp)) { ?>
                            <div>
                                <input type="checkbox" name="staff[ ]" value="<?php echo $row['staff_id']; ?>" checked><?php echo $row['staff_fn'] . " " . $row['staff_ln'] . " - <i>" . $row['staff_pos'] . "</i>"; ?><br />
                            </div>
                        <?php } else { ?>
                            <div>
                                <input type="checkbox" name="staff[ ]" value="<?php echo $row['staff_id']; ?>"><?php echo $row['staff_fn'] . " " . $row['staff_ln'] . " - <i>" . $row['staff_pos'] . "</i>"; ?><br />
                            </div>
                        <?php }
                        }
                    } ?>
                </div>
                <button id="staff-btn" name="update-staff">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Update Staff</button>
            </form>
        </div>
    </main>
    </div>
</body>

</html>