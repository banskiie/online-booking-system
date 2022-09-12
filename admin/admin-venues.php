<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-lower.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Venues</h1>
        <a href="admin-venues-add.php"><button id="add">Add New Venue</button></a>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            require '../db/database.php';
            $sql = "SELECT * FROM venue";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['venue_name']; ?></td>
                        <td><?php echo $row['venue_add']; ?></td>
                        <td class="btn">
                            <form action="admin-venues-edit.php?venue_id=<?php echo $row['venue_id']; ?>" method="post">
                                <button id="update" name="update">Update</button>
                            </form>
                        </td>
                        <td class="btn">
                            <form action="../util/admin_venue.php?venue_id=<?php echo $row['venue_id']; ?>" method="post">
                                <button id="delete" name="delete">Delete</button>
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