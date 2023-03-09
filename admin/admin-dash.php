<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-dash.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>

    <main class="content">
        <h1>Dashboard</h1>
        <section class="upper-dash">
            <div class='dashboard_card_bigger'>
                <h3>New Inquiries</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM inquiry WHERE inq_status=0";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card_bigger'>
                <h3>New Inbox Messages</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM inbox WHERE inbox_status=0";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card_bigger'>
                <h3>
                    <?php echo
                        date("F"); ?> Bookings
                </h3>
                <p><b>
                        <?php
                        $month = (int) date("m");
                        $sql = "SELECT * FROM booking WHERE MONTH(bk_date)=$month";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
        </section>
        <section class="lower-dash">
            <div class='dashboard_card'>
                <h3>Pending Bookings</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM booking WHERE bk_status=0";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Scheduled Weddings</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM booking WHERE bk_status=2";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Booked Weddings</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM booking WHERE bk_status=1";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Current Clients</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM booking WHERE bk_status<3;";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Packages</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM package WHERE pkg_status=1";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Venues</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM venue WHERE venue_status=1";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Suppliers</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM supplier WHERE supp_status=1";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Staff</h3>
                <p><b>
                        <?php
                        $sql = "SELECT * FROM staff WHERE staff_status=1";
                        $query = mysqli_query($conn, $sql);
                        echo mysqli_num_rows($query);
                        ?>
                    </b></p>
            </div>
        </section>

    </main>
    </div>
</body>

</html>