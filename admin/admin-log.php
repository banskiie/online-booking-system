<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
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
                require '../db/database.php';
                $sql = "SELECT * FROM user_log ORDER BY ulog_datetime DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['ulog_act']; ?></td>
                            <td><?php echo $row['ulog_datetime']; ?></td>
                        </tr>
                <?php };
                } ?>
            </table>
        </div>

    </main>
    </div>
</body>

</html>