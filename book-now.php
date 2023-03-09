<?php
include 'includes/head.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
    <script src="scripts/my_booking.js" defer></script>
</head>

<body>

    <?php if (isset($_GET['date-taken'])) {
        echo '<script>alert("Date Already Booked/Taken!")</script>';
    } else if (isset($_GET['venue-added'])) {
        echo '<script>alert("New Custom Venue Added!")</script>';
    } else if (isset($_GET['supplier-added'])) {
        echo '<script>alert("New Custom Supplier Added!")</script>';
    } else if (isset($_GET['email-taken'])) {
        echo '<script>alert("Email Already Taken!")</script>';
    } else if (isset($_GET['pass-not-the-same'])) {
        echo '<script>alert("Password not the same!")</script>';
    } else if (isset($_GET['error'])) {
        echo '<script>alert("Error!")</script>';
    }

    include 'includes/header.php';
    ?>
    <?php
    $sql = "SELECT * FROM booking
                        INNER JOIN venue ON booking.venue_id = venue.venue_id
                        INNER JOIN package ON booking.pkg_id = package.pkg_id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        ?>
        <section id="add-booking-section">
            <form id="new-booking" action="util/book-now.php" method="post" enctype="multipart/form-data">
                <h1>Book Now!</h1>
                <h2>Registration</h2>
                <div class="form-comp">
                    <label class="label">First Name</label>
                    <input type="text" name="fn" maxlength="50" required>
                </div>
                <div class="form-comp">
                    <label class="label">Last Name</label>
                    <input type="text" name="ln" maxlength="50" required>
                </div>
                <div class="form-comp">
                    <label class="label">Email</label>
                    <input type="email" name="email" maxlength="100" required>
                </div>
                <div class="form-comp">
                    <label class="label">Password</label>
                    <input type="password" name="pass" maxlength="50" required>
                </div>
                <div class="form-comp">
                    <label class="label">Confirm Password</label>
                    <input type="password" name="conf_pass" maxlength="50" required>
                </div>
                <h2>Booking</h2>
                <div class="form-comp">
                    <label class="label">Event Name</label>
                    <input type="text" name="name" maxlength="100" required>
                </div>
                <div class="form-comp">
                    <label class="label">Number of Guests</label>
                    <input type="int" name="guest" maxlength="4" required>
                </div>
                <div class="form-comp">
                    <label class="label">Date</label>
                    <input type="date" name="date"
                        min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 months')); ?>" required>
                </div>
                <?php if (isset($_GET['venue-added'])) { ?>
                    <div class="form-comp option">
                        <label class="label">Venue</label>
                        <select id="venue" name="venue" required>
                            <option value="" disabled selected>-- Select Venue --</option>
                            <?php
                            $sql = "SELECT * FROM venue WHERE venue_status=1 OR venue_status=99999";
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
                            $sql = "SELECT * FROM venue WHERE venue_status=1 OR venue_status=99999";
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
                                <option value="<?php echo $row['pkg_id']; ?>"
                                    title="₱<?php echo $row['pkg_price']; ?> - <?php echo $row['pkg_desc']; ?>"><?php echo $row['pkg_name']; ?></option>
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
                            $sql = "SELECT * FROM supplier WHERE supp_status=99999";
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
                    </svg>
                    Suggest Custom Supplier</a>
                <a id="venue-btn"></a>
                <div class="form-comp">
                    <label class="label">Remark</label>
                    <textarea name="remark" maxlength="255"></textarea>
                </div>
                <button class="bk-btn" name="book">Book Now!</button>

            </form>
            <form id="new-booking" action="util/book-now.php" method="post" enctype="multipart/form-data">
                <button class="cancel-btn" name="cancel">Cancel</button>
            </form>
        </section>
    <?php } ?>

    <!-- Custom Venue -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="util/book-now.php" method="post" enctype="multipart/form-data">
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
    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("venue-btn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <!-- Custom Supplier -->
    <div id="suppModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="util/book-now.php" method="post" enctype="multipart/form-data">
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
    <script>
        var modal2 = document.getElementById("suppModal");
        var btn2 = document.getElementById("supp-btn");
        var span = document.getElementsByClassName("close")[1];

        btn2.onclick = function () {
            modal2.style.display = "block";
        }

        span.onclick = function () {
            modal2.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>