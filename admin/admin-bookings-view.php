<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-booking.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <div id="view-booking">
            <?php
            if (isset($_POST['view'])) {
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

                    <p>Suppliers: <?php $sql2 = "SELECT * FROM supplier_grp INNER JOIN supplier ON supplier.supp_id = supplier_grp.supp_id WHERE bk_id = $id";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) { ?>
                                <br><span><?php echo $row2['supp_name']; ?> </span>
                            <?php }
                                    } else { ?> <span> Suppliers no longer exists </span> <?php } ?>
                    </p>
                    <p>Venue: <strong><?php echo $row['venue_name']; ?></strong></p>
                    <p>Date: <strong><?php echo $row['bk_date']; ?></strong></p>
                    <p id="remark">Remark: <br>
                        <?php echo $row['bk_remark']; ?>
                    </p>
                    <form action="../util/admin_booking.php?bk_id=<?php echo $id; ?>" method="post">
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
            } ?>
            <div id="button-grp">
                <a href="admin-bookings.php"><button id="back"><- Back</button></a>
            </div>
        </div>

    </main>
    </div>
</body>

</html>