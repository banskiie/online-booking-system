<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Venues</h1>
        <button><a href="admin-venues-add.php">Add New Venue</a></button>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
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
                        <td>
                            <form action="admin-venues-edit.php?venue_id=<?php echo $row['venue_id']; ?>" method="post">
                                <button name="update">Update</button>
                            </form>
                            <form action="../util/admin_venue.php?venue_id=<?php echo $row['venue_id']; ?>" method="post">
                                <button name="delete">Delete</button>
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