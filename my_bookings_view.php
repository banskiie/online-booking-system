<!-- head.php -->
<?php
include 'includes/head.php';
@session_start();
include 'util/client_conn.php';
?>
<!-- head.php -->

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
</head>

<body>

    <!-- header.php -->
    <?php
    include 'includes/header.php';
    include 'util/client_conn.php';
    ?>
    <!-- header.php -->

    <section id="booking-section">
        <div id="view-booking">
            <?php
            require 'db/database.php';
            if (isset($_POST['view'])) {
                $sql = "SELECT * FROM booking 
                INNER JOIN venue ON booking.venue_id = venue.venue_id 
                INNER JOIN package ON booking.pkg_id = package.pkg_id
                WHERE bk_id = '{$_GET['bkid']}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <h1><?php echo $row['bk_name']; ?></h1>
                    <p>Package: <strong><?php echo $row['pkg_name']; ?></strong></p>
                    <p>Number of Guests: <strong><?php echo $row['bk_guest']; ?></strong></h1>

                    <p>Suppliers: <?php $sql2 = "SELECT * FROM supplier_grp INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id WHERE bk_id = '{$_GET['bkid']}'";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) { ?>
                                <br><span> <?php echo $row2['supp_name']; ?> </span>
                            <?php }
                                    } else { ?> <span> Suppliers no longer exists </span> <?php } ?>
                    </p>

                    <p>Venue: <strong><?php echo $row['venue_name']; ?></strong></p>
                    <p>Date: <strong><?php echo $row['bk_date']; ?></strong></p>
                    <p style="color:red"> Status: <strong><?php if ($row['bk_status'] == 0) {
                                                                echo "Pending";
                                                            } else if ($row['bk_status'] == 1) {
                                                                echo "Scheduled";
                                                            } else if ($row['bk_status'] == 2) {
                                                                echo "Finished";
                                                            } else if ($row['bk_status'] == 3) {
                                                                echo "Cancelled";
                                                            } ?></strong></p>
                    <p>Remark: <br><br>
                        <?php echo $row['bk_remark']; ?>
                    </p>
            <?php };
            } ?>
            <a id="back-btn" href="my_bookings.php">Back</a>
        </div>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->

</body>

</html>