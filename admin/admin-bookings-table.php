<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<?php
if (isset($_POST['sort-date'])) {

    $date1 = date('Y-m-d', strtotime($_POST['date1']));
    $date2 = date('Y-m-d', strtotime($_POST['date2']));
    $book = $_POST['book-type'];

    ?>

    <body>
        <p class="docu-top"><br>Yani M. Wedding and Events</p>
        <p class="docu-top">Ground Floor, Nazareth Business Center, Nazareth, <br>21st St, 9000 Cagayan de Oro City</p>
        <h1 class="docu-top" style="margin: 2rem auto 0;">List of Weddings Reports</h2>
            <h3 class="docu-top">
                <?php $date_time = new DateTime($date1);
                $formated_date = $date_time->format('F d, Y');
                echo $formated_date; ?>
                to
                <?php $date_time = new DateTime($date2);
                $formated_date = $date_time->format('F d, Y');
                echo $formated_date; ?>
            </h3>

            <main class="content" id="content-for-print">


                <div class="tbl-cont cont-print" style="width: 100vw;">
                    <table id="tbl-print" style="border-collapse: none;">
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Package</th>
                            <th>Venue</th>
                            <th>Guests</th>
                            <th>Staff</th>
                            <th>Supplier</th>
                            <th style="text-align:center;">Status</th>
                        </tr>
                        <?php

                        if ($book > 3) {
                            $sql = "SELECT * from booking 
                            INNER JOIN venue ON booking.venue_id = venue.venue_id
                            INNER JOIN package ON package.pkg_id = booking.pkg_id
                            WHERE bk_date BETWEEN '$date1' AND '$date2' ORDER BY bk_date";
                            $res_data = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res_data)) { ?>
                                <tr>
                                    <td>
                                        <?php $date_time = new DateTime($row['bk_date']);
                                        $formated_date = $date_time->format('M j, Y D');
                                        echo $formated_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['bk_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pkg_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['venue_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['bk_guest']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $bk_date = $row['bk_date'];
                                        $sql = "SELECT * FROM booking INNER JOIN staff_grp ON booking.bk_id = staff_grp.bk_id 
                                        WHERE bk_date='$bk_date'";
                                        $query = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($query); ?>
                                    </td>
                                    <td>
                                        <?php
                                        $bk_date = $row['bk_date'];
                                        $sql = "SELECT * FROM booking INNER JOIN supplier_grp ON booking.bk_id = supplier_grp.bk_id 
                                        WHERE bk_date='$bk_date'";
                                        $query = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($query); ?>
                                    </td>
                                    <td style="text-align:center;">
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
                                </tr>
                            <?php }

                        } else {
                            $sql = "SELECT * from booking 
                            INNER JOIN venue ON booking.venue_id = venue.venue_id
                            WHERE bk_status = '$book' AND bk_date BETWEEN '$date1' AND '$date2' ORDER BY bk_date";
                            $res_data = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res_data)) { ?>
                                <tr>
                                    <td>
                                        <?php $date_time = new DateTime($row['bk_date']);
                                        $formated_date = $date_time->format('M j, Y D');
                                        echo $formated_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['bk_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pkg_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['venue_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['bk_guest']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $bk_date = $row['bk_date'];
                                        $sql = "SELECT * FROM booking INNER JOIN staff_grp ON booking.bk_id = staff_grp.bk_id 
                                        WHERE bk_date='$bk_date'";
                                        $query = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($query); ?>
                                    </td>
                                    <td>
                                        <?php
                                        $bk_date = $row['bk_date'];
                                        $sql = "SELECT * FROM booking INNER JOIN supplier_grp ON booking.bk_id = supplier_grp.bk_id 
                                        WHERE bk_date='$bk_date'";
                                        $query = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($query); ?>
                                    </td>
                                    <td style="text-align:center;">
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
                                </tr>
                            <?php }
                        }


} ?>
                </table>
                <p id="signature">Prepared by: <br><br><b><u>
                            <?php echo $_SESSION['first_name'] ?>
                        </u></b></p>
                <div>

                    <div id="top-form">
                        <a onclick="window.print()" id="back">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </main>

</body>

</html>