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
        <h1>User Log</h1>
        <div class="tbl-cont">
            <table>
                <tr>
                    <th>Activity</th>
                    <th>Time</th>
                </tr>
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 13;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                $total_pages_sql = "SELECT COUNT(*) FROM user_log ORDER BY ulog_datetime DESC";
                $result = mysqli_query($conn, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $sql = "SELECT * FROM user_log ORDER BY ulog_datetime DESC LIMIT $offset, $no_of_records_per_page";
                $res_data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($res_data)) { ?>
                    <tr>
                        <td><?php echo $row['ulog_act']; ?></td>
                        <td><?php echo $row['ulog_datetime']; ?></td>
                    </tr>
                <?php }
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
    </main>
    </div>
</body>

</html>