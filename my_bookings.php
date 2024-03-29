<?php
include 'util/client_conn.php';
include 'includes/head.php';
require 'db/database.php';

?>

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
    <script src="scripts/my_booking.js" defer></script>
</head>

<?php if (isset($_GET['date-taken'])) {
    echo '<script>alert("Date Already Booked/Taken!")</script>';
} else if (isset($_GET['venue-added'])) {
    echo '<script>alert("New Custom Venue Added!")</script>';
} else if (isset($_GET['supplier-added'])) {
    echo '<script>alert("New Custom Supplier Added!")</script>';
}
?>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <?php
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM booking WHERE clnt_id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <section id="booking-section">
                <div id="view-booking">
                    <?php
                    $sql = "SELECT * FROM booking
                        INNER JOIN venue ON booking.venue_id = venue.venue_id
                        INNER JOIN package ON booking.pkg_id = package.pkg_id
                        WHERE clnt_id = $id";
                    $bk_id = $row['bk_id'];
                    $result = $conn->query($sql);
                    if ($row = $result->fetch_assoc()) { ?>
                        <h1><?php echo $row['bk_name']; ?></h1>
                        <p>Package: <strong><?php echo $row['pkg_name']; ?></strong></p>
                        <p>Number of Guests: <strong><?php echo $row['bk_guest']; ?></strong></h1>
                        <p>Suppliers: <?php $sql2 = "SELECT * FROM supplier_grp INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id WHERE supplier_grp.bk_id = $bk_id";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) { ?>
                                    <br><span> <?php echo $row2['supp_name']; ?> </span>
                                <?php }
                                        } else { ?> <span> None</span> <?php } ?>
                        </p>

                        <p>Venue: <strong><?php if ($row['venue_name'] == NULL) {
                                                echo "None";
                                            } else {
                                                echo $row['venue_name'];
                                            } ?></strong></p>
                        <p>Date: <strong><?php echo $row['bk_date']; ?></strong></p>
                        <p style="color:red"> Status: <?php if ($row['bk_status'] == 0) { ?>
                                <span class="status pending">Pending</span>
                            <?php } else if ($row['bk_status'] == 1) { ?>
                                <span class="status scheduled">Scheduled</span>
                            <?php } else if ($row['bk_status'] == 2) { ?>
                                <span class="status finished">Finished</span>
                            <?php } else if ($row['bk_status'] == 3) { ?>
                                <span class="status cancelled">Cancelled</span>
                            <?php } ?>
                        </p>
                        <p id="remark">Remark: <br><br>
                            <i><?php echo $row['bk_remark']; ?></i>
                        </p>
                        <?php if ($row['bk_status'] == 0) { ?>
                            <form action="my_bookings_update.php" method="post">
                                <button id="update" name="update">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span>Update</span>
                                </button>
                            </form>
                        <?php } ?>
                </div>
            </section>
    <?php }
                }
            } else { ?>
    <section id="add-booking-section">
        <form id="new-booking" action="util/client_actions.php" method="post" enctype="multipart/form-data">
            <h1>Add New Booking</h1>
            <div class="form-comp">
                <label class="label">Event Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-comp">
                <label class="label">Number of Guests</label>
                <input type="int" name="guest" maxlength="5" required>
            </div>
            <div class="form-comp">
                <label class="label">Date</label>
                <?php $date = date('Y-m-d'); ?>
                <input type="date" name="date" min="<?php echo date('Y-m-d', strtotime($date. ' + 2 months')); ?>" required>
            </div>
            <?php if (isset($_GET['venue-added'])) { ?>
                <div class="form-comp option">
                    <label class="label">Venue</label>
                    <select id="venue" name="venue">
                        <option value="" disabled selected>-- Select Venue --</option>
                        <?php
                        $sql = "SELECT * FROM venue WHERE venue_status=1 OR venue_status=$id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['venue_id']; ?>"
                                title="<?php echo $row['venue_add']; ?> - <?php echo $row['venue_desc']; ?>"><?php echo $row['venue_name']; ?> (<?php echo $row['venue_cap']; ?> pax)</option>
                                <?php }
                        } ?>
                        <option value="others">[[Suggest Custom Venue]]</option>
                    </select>
                </div>


            <?php } else { ?>
                <div class="form-comp option">
                    <label class="label">Venue</label>
                    <select id="venue" name="venue">
                        <option value="" disabled selected>-- Select Venue --</option>
                        <?php
                        $sql = "SELECT * FROM venue WHERE venue_status=1 OR venue_status=$id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['venue_id']; ?>"
                                title="<?php echo $row['venue_add']; ?> - <?php echo $row['venue_desc']; ?>"><?php echo $row['venue_name']; ?> (<?php echo $row['venue_cap']; ?> pax)</option>
                                <?php }
                        } ?>
                        <option value="others">[[Suggest Custom Venue]]</option>
                    </select>
                </div>
            <?php } ?>

            
                <div class="form-comp option">
                    <label class="label">Package</label>
                    <select name="package" required>
                        <option value="" disabled selected>-- Select Package --</option>
                        <?php
                        $sql = "SELECT * FROM package WHERE pkg_status=1";
                        $result = $conn->query($sql);
                         if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['pkg_id']; ?>" title="₱<?php echo $row['pkg_price']; ?> - <?php echo $row['pkg_desc']; ?>"><?php echo $row['pkg_name']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div>
                    <label class="label">Suppliers</label>
                    <div class="supp-grp">
                        <div id="supp-checklist">
                            <span><b>Digital Services</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Photography' OR supp_role = 'Videography'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Food and Pastries</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Food Catering' OR supp_role = 'Dessert and Pastries'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Stylists</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1 AND supp_role = 'Stylist'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>HMUA</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1  AND supp_role = 'HMUA'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>DJ and Hosting</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=1  AND supp_role = 'DJ' OR supp_role = 'Emcee'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div id="supp-checklist">
                            <span><b>Custom by Client</b></span>
                            <?php
                            $sql = "SELECT * FROM supplier WHERE supp_status=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div>
                                        <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?> - [<?php echo $row['supp_role']; ?>]<br />
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <a id="supp-btn"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>Suggest Custom Supplier</a>
                <a id="venue-btn"></a>
                <div class="form-comp">
                    <label class="label">Remark</label>
                    <textarea name="remark" maxlength="255"></textarea>
                </div>
            

            <button name="add" onclick="">Add</button>
            <?php if (isset($_GET['venue-added'])) { ?>
                <form action="util/client_actions.php" method="post" enctype="multipart/form-data">
                    <button class="vc" name="xb">Remove Custom Venue</button>
                </form>
            <?php } ?>
        </form>




    </section>
<?php } ?>

<!-- Custom Venue -->
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="util/client_actions.php" method="post" enctype="multipart/form-data">
                <h2>Custom Venue</h2>
                <div class="form-comp">
                    <label class="label">Venue Name</label>
                    <input type="text" name="custom-venue" maxlength="100" required>
                    <label class="label">Venue Address</label>
                    <input type="text" name="custom-add" maxlength="100" required>
                    <label class="label">Venue Capacity</label>
                    <input type="number" name="custom-cap" maxlength="4">
                    <label class="label">Venue Description</label>
                    <input type="text" name="custom-desc" maxlength="255">
                    <button name="add-venue">Enter</button>
                </div>
            </form>
        </div>
    </div>
<!-- Custom Supplier -->
<div id="suppModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="util/client_actions.php" method="post" enctype="multipart/form-data">
                <div class="form-comp">
                    <h2>Custom Supplier</h2>
                    <label class="label">Supplier Name</label>
                    <input type="text" name="custom-supp">
                    <label class="label">Supplier Role</label>
                    <input type="text" name="custom-role">
                    <button name="add-supp">Add</button>
                </div>
            </form>
        </div>
</div> 

<?php
include 'includes/footer.php';
?>
</body>

</html>