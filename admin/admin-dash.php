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
        <section>
            <div class='dashboard_card'>
                <h3>Unread Inquiries</h3>
                <p><b><?php
                    $sql = "SELECT * FROM inquiry WHERE inq_status=0";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Pending Bookings</h3>
                <p><b><?php
                    $sql = "SELECT * FROM booking WHERE bk_status=0";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Booked Weddings</h3>
                <p><b><?php
                    $sql = "SELECT * FROM booking WHERE bk_status=1";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Packages</h3>
                <p><b><?php
                    $sql = "SELECT * FROM package";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Venues</h3>
                <p><b><?php
                    $sql = "SELECT * FROM venue";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
            <div class='dashboard_card'>
                <h3>Active Suppliers</h3>
                <p><b><?php
                    $sql = "SELECT * FROM supplier";
                    $query = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($query);
                    ?></b></p>
            </div>
        </section>
    </main>
    </div>
</body>

</html>