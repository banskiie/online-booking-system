<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Bookings</h1>
        <form action="admin-bookings.php" method="GET">
            <input name="search" type="text">
            <button name="search-submit" id="search"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
        <div class="tbl-cont">
            <table>

                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>


                <?php
                if (isset($_GET['search-submit'])) {
                    $queried = mysqli_real_escape_string($conn, preg_replace('/\s+/', ' ', trim($_GET['search'])));
                    if (empty($queried)) {
                        $sql = "SELECT * FROM booking";
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
                                        } ?></td>
                                    <td class="btn">
                                        <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                            <button name="view" id="view">View</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        }
                    } else {
                        if (strpos($queried, ", ")) {
                            $query = str_replace(", ", " ", $queried);
                            $keys = explode(" ", $query);
                        } else if (strpos($queried, ",")) {
                            $query = str_replace(",", " ", $queried);
                            $keys = explode(" ", $query);
                        } else {
                            $keys = explode(" ", $queried);
                        }
                        $sql = "SELECT * FROM booking WHERE (bk_name LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR bk_name LIKE '%$k%' ";
                        }
                        $result = mysqli_query($conn, $sql);
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
                                        } ?></td>
                                    <td class="btn">
                                        <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                            <button name="view" id="view">View</button>
                                        </form>
                                    </td>
                                </tr>
                    <?php }
                        };
                    }
                } else { ?>
                    <?php
                    $sql = "SELECT * FROM booking";
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
                                    } ?></td>
                                <td class="btn">
                                    <form action="admin-bookings-view.php?bk_id=<?php echo $row['bk_id']; ?>" method="post">
                                        <button name="view" id="view">View</button>
                                    </form>
                                </td>
                            </tr>

                <?php };
                    }
                }
                ?>




            </table>
        </div>

    </main>
    </div>

</body>

</html>