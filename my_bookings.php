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

    <section id="booking-section">
        <a href="my_bookings_new.php"><button id="new-bk-btn">New Booking</button>
            <div id="tables">
        </a>
        <div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                require 'db/database.php';
                $sql = "SELECT * FROM booking where clnt_id = '{$_SESSION['id']}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['bk_name']; ?></td>
                            <td><?php echo $row['bk_date']; ?></td>
                            <td><?php if ($row['bk_status'] == 0) {
                                    echo "Pending";
                                } else if ($row['bk_status'] == 1) {
                                    echo "Scheduled";
                                } else if ($row['bk_status'] == 2) {
                                    echo "Finished";
                                } else if ($row['bk_status'] == 3) {
                                    echo "Cancelled";
                                } ?>
                            <td>
                                <form action="my_bookings_view.php?bkid=<?php echo $row['bk_id']; ?>" method="post" enctype="multipart/form-data">
                                    <button name="view" id="view-btn">View</button>
                                </form>
                                <form action="util/client_actions.php?bkid=<?php echo $row['bk_id']; ?>" method="post" enctype="multipart/form-data">
                                    <button name="cancel" id="cancel-btn">Cancel</button>
                                </form>
                            </td>
                        </tr>
                <?php };
                } ?>
            </table>
        </div>
        </div>

    </section>

    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->

</body>

</html>