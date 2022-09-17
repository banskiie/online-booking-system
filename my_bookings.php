<?php
include 'includes/head.php';
@session_start();
include 'util/client_conn.php';
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

    <section id="booking-section">
        <a href="my_bookings_new.php"><button id="new-bk-btn">New Booking</button>
            <div id="tables">
        </a>
        <div id="clnt-bookings">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                $id = $_SESSION['id'];
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 3;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                $total_pages_sql = "SELECT COUNT(*) FROM booking WHERE clnt_id=$id";
                $result = mysqli_query($conn, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $sql = "SELECT * FROM booking WHERE clnt_id=$id LIMIT $offset, $no_of_records_per_page";
                $res_data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($res_data)) { ?>
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
                ?>
            </table>

        </div>
        <div class="pagination">
            <ul>
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </div>
        </div>

    </section>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>