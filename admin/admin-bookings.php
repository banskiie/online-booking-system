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
        <div class="tbl-cont">
            <table>

                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>

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
                } ?>

            </table>
        </div>

    </main>
    </div>

</body>

</html>