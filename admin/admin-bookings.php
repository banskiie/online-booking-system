<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<?php if (isset($_POST['booking_updated'])) {
    echo '<script>alert("Booking Updated")</script>';
} ?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Bookings</h1>
        <div class="top-bk">
            <form id="top-form" action="admin-bookings-table.php" method="POST">
                <label class="date-lbl">From</label>
                <input name="date1" type="date" required>
                <label class="date-lbl">To</label>
                <input name="date2" type="date" required>
                <select class="book-type" name="book-type">
                    <option value="0">Pending</option>
                    <option value="1">Scheduled</option>
                    <option value="2">Finished</option>
                    <option value="3">Cancelled</option>
                    <option value="4">All</option>
                </select>
                <button name="sort-date" id="search">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </button>

            </form>
        </div>



        <div class="tbl-cont">
            <table style="width:80vw;">
                <tr>
                    <th style="width: 8vw;">Date</th>
                    <th>Name</th>
                    <th style="width: 8vw; text-align: center;">Status</th>
                    <th style="width: 3vw;"></th>
                </tr>
                <?php

                if (isset($_POST['search-submit'])) {
                    $queried = mysqli_real_escape_string($conn, preg_replace('/\s+/', ' ', trim($_POST['search'])));
                    if (strpos($queried, ", ")) {
                        $query = str_replace(", ", " ", $queried);
                        $keys = explode(" ", $query);
                    } else if (strpos($queried, ",")) {
                        $query = str_replace(",", " ", $queried);
                        $keys = explode(" ", $query);
                    } else {
                        $keys = explode(" ", $queried);
                    }
                    if (empty($queried)) {
                        unset($_COOKIE["search"]);
                        if (isset($_POST['pageno'])) {
                            $pageno = $_POST['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 14;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM booking";
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM booking ORDER BY bk_date DESC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <?php $date_time = new DateTime($row['bk_date']);
                                    $formated_date = $date_time->format('D [M d Y]');
                                    echo $formated_date; ?>
                                </td>
                                <td style="width: 30rem;">
                                    <?php echo $row['bk_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($row['bk_status'] == 0) { ?>
                                        <span class="status pending">Pending</span>
                                    <?php } else if ($row['bk_status'] == 1) { ?>
                                            <span class="status scheduled">Scheduled</span>
                                    <?php } else if ($row['bk_status'] == 2) { ?>
                                                <span class="status finished">Finished</span>
                                    <?php } else if ($row['bk_status'] == 3) { ?>
                                                    <span class="status cancelled">Cancelled</span>
                                    <?php } ?>
                                </td>
                                <td style="text-align: end;" class="btn">
                                    <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                        <button name="view" id="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        $_COOKIE['search'] = $queried;
                        if (isset($_POST['pageno'])) {
                            $pageno = $_POST['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 14;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM booking WHERE (bk_name LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $total_pages_sql .= " OR bk_name LIKE '%$k%'";
                        }
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM booking ORDER BY bk_date DESC WHERE (bk_name LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR bk_name LIKE '%$k%'";
                        }
                        $sql .= "LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <?php $date_time = new DateTime($row['bk_date']);
                                    $formated_date = $date_time->format('D [M d Y]');
                                    echo $formated_date; ?>
                                </td>
                                <td style="width: 30rem;">
                                    <?php echo $row['bk_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($row['bk_status'] == 0) { ?>
                                        <span class="status pending">Pending</span>
                                    <?php } else if ($row['bk_status'] == 1) { ?>
                                            <span class="status scheduled">Scheduled</span>
                                    <?php } else if ($row['bk_status'] == 2) { ?>
                                                <span class="status finished">Finished</span>
                                    <?php } else if ($row['bk_status'] == 3) { ?>
                                                    <span class="status cancelled">Cancelled</span>
                                    <?php } ?>
                                </td>
                                <td style="text-align: end;" class="btn">
                                    <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                        <button name="view" id="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    }
                } else if (isset($_POST['sort-date'])) {
                    $date1 = date('Y-m-d', strtotime($_POST['date1']));
                    $date2 = date('Y-m-d', strtotime($_POST['date2']));
                    $sql = sprintf(
                        "SELECT * from booking WHERE 
                        bk_date BETWEEN '$date1' AND '$date2'"
                    );
                    mysqli_query($conn, $sql);
                    // unset($_COOKIE["search"]);
                    if (isset($_POST['pageno'])) {
                        $pageno = $_POST['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 14;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) from booking WHERE bk_date BETWEEN '$date1' AND '$date2'";
                    $result = mysqli_query($conn, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * from booking WHERE bk_date BETWEEN '$date1' AND '$date2' ORDER BY bk_date DESC LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <?php $date_time = new DateTime($row['bk_date']);
                                    $formated_date = $date_time->format('D [M d Y]');
                                    echo $formated_date; ?>
                                </td>
                                <td style="width: 30rem;">
                                    <?php echo $row['bk_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                <?php if ($row['bk_status'] == 0) { ?>
                                        <span class="status pending">Pending</span>
                                <?php } else if ($row['bk_status'] == 1) { ?>
                                            <span class="status scheduled">Scheduled</span>
                                <?php } else if ($row['bk_status'] == 2) { ?>
                                                <span class="status finished">Finished</span>
                                <?php } else if ($row['bk_status'] == 3) { ?>
                                                    <span class="status cancelled">Cancelled</span>
                                <?php } ?>
                                </td>
                                <td style="text-align: end;" class="btn">
                                    <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                        <button name="view" id="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    <?php }
                } else {
                    if (isset($_POST['pageno'])) {
                        $pageno = $_POST['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 14;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM booking";
                    $result = mysqli_query($conn, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM booking ORDER BY bk_date DESC LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <?php $date_time = new DateTime($row['bk_date']);
                                    $formated_date = $date_time->format('D [M d Y]');
                                    echo $formated_date; ?>
                                </td>
                                <td style="width: 30rem;">
                                    <?php echo $row['bk_name']; ?>
                                </td>
                                <td style="text-align: center;">
                                <?php if ($row['bk_status'] == 0) { ?>
                                        <span class="status pending">Pending</span>
                                <?php } else if ($row['bk_status'] == 1) { ?>
                                            <span class="status scheduled">Scheduled</span>
                                <?php } else if ($row['bk_status'] == 2) { ?>
                                                <span class="status finished">Finished</span>
                                <?php } else if ($row['bk_status'] == 3) { ?>
                                                    <span class="status cancelled">Cancelled</span>
                                <?php } ?>
                                </td>
                                <td style="text-align: end;" class="btn">
                                    <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                        <button name="view" id="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                    <?php }
                    ;
                }
                ?>
            </table>
        </div>



        <?php if (!empty($_COOKIE['search'])) { ?>
            <div class="pagination">
                <ul>
                    <li>
                        <a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=1" ?> ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?>">
                        <a href="<?php if ($pageno <= 1) {
                            echo '#';
                        } else {
                            echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno - 1);
                        } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                            echo '#';
                        } else {
                            echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno + 1);
                        } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    <li><a
                            href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . $total_pages ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="pagination">
                <ul>
                    <li><a href="?pageno=1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                            </svg>
                        </a></li>
                    <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?>">
                        <a href="<?php if ($pageno <= 1) {
                            echo '#';
                        } else {
                            echo "?pageno=" . ($pageno - 1);
                        } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                            echo '#';
                        } else {
                            echo "?pageno=" . ($pageno + 1);
                        } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } ?>
    </main>
    </div>
</body>



</html>