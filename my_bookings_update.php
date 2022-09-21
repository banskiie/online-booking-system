<?php
include 'util/client_conn.php';
include 'includes/head.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
    <script src="scripts/my_bookings.js" defer></script>
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>
    <?php
    $sql = "SELECT * FROM booking
                        INNER JOIN venue ON booking.venue_id = venue.venue_id
                        INNER JOIN package ON booking.pkg_id = package.pkg_id
                        WHERE clnt_id = $id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
    ?>
        <section id="add-booking-section">
            <form id="new-booking" action="util/client_actions.php" method="post" enctype="multipart/form-data">
                <h1>Update Booking</h1>
                <div class="form-comp">
                    <label class="label">Name</label>
                    <input type="text" name="name" value="<?php echo $row['bk_name']; ?>" required>
                </div>
                <div class="form-comp">
                    <label class="label">Number of Guests</label>
                    <input type="int" name="guest" value="<?php echo $row['bk_guest']; ?>" maxlength="5" required>
                </div>
                <div class="form-comp">
                    <label class="label">Date</label>
                    <input type="date" name="date" value="<?php echo $row['bk_date']; ?>" required>
                </div>
                <div class="form-comp option">
                    <label class="label">Package</label>
                    <select name="package" required>
                        <option value="" disabled selected>-- Select Package --</option>
                        <?php
                        $sql = "SELECT * FROM package WHERE pkg_status=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['pkg_id']; ?>"><?php echo $row['pkg_name']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-comp option">
                    <label class="label">Venue</label>
                    <select name="venue" required>
                        <option value="" disabled selected>-- Select Venue --</option>
                        <?php
                        $sql = "SELECT * FROM venue WHERE venue_status=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['venue_id']; ?>"><?php echo $row['venue_name']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div>
                    <label class="label">Suppliers</label>
                    <div id="supp-checklist">
                        <?php
                        $sql = "SELECT * FROM supplier WHERE supp_status=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div>
                                    <input type="checkbox" name="supp[ ]" value="<?php echo $row['supp_id']; ?>"><?php echo $row['supp_name']; ?><br />
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="form-comp">
                    <?php
                    $sql = "SELECT * FROM booking WHERE clnt_id=$id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <label class="label">Remark</label>
                            <textarea name="remark" maxlength="255" ><?php echo $row['bk_remark']; ?></textarea>
                    <?php }
                    } ?>
                </div>
                <button name="update-bk">Update</button>
                <a href="my_bookings.php">Cancel</a>
            </form>
        </section>
    <?php } ?>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>