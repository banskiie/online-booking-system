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
        <h1>Inquiries</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
            <?php
            require '../db/database.php';
            $sql = "SELECT * FROM inquiry";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['inq_name']; ?></td>
                        <td><?php echo $row['inq_email']; ?></td>
                        <td class="btn">
                            <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post">
                                <button id="view" name="view">View</button>
                            </form>
                        </td>
                    </tr>
            <?php };
            } ?>
        </table>
    </main>
    </div>
</body>

</html>