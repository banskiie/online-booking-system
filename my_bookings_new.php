<!-- head.php -->
<?php
include 'includes/head.php';
@session_start();
include 'util/client_conn.php';
?>
<!-- head.php -->

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
    <script src="scripts/my_bookings.js" defer></script>
</head>

<body>
    <!-- header.php -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- header.php -->
    <section id="add-booking-section">
        <form id="new-booking" action="util/client_actions.php" method="post"  enctype="multipart/form-data">
            <h1>Add New Booking</h1>
            <div class="form-comp">
                <label class="label">Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-comp">
                <label class="label">Number of Guests</label>
                <input type="int" name="guest" required>
            </div>
            <div class="form-comp">
                <label class="label">Date</label>
                <input type="date" name="date" required>
            </div>

            <div class="form-comp option">
                <label class="label">Package</label>
                <select name="package" required>
                    <?php
                    require 'db/database.php';
                    $sql = "SELECT * FROM package";
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
                    <?php
                    require 'db/database.php';
                    $sql = "SELECT * FROM venue";
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
                    require 'db/database.php';
                    $sql = "SELECT * FROM supplier";
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
                <label class="label">Remark</label>
                <textarea name="remark"></textarea>
            </div>

            <button name="add">Add</button>
            <a href="my_bookings.php">Cancel</a>
        </form>
    </section>
    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->
</body>

</html>