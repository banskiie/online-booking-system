<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Packages</h1>
        <button><a href="admin-packages-add.php">Add New Package</a></button>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php
            require '../db/database.php';
            $sql = "SELECT * FROM package";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['pkg_name']; ?></td>
                        <td><?php echo $row['pkg_price']; ?></td>
                        <td>
                            <form action="admin-packages-view.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
                                <button name="view">View</button>
                            </form>
                            <form action="admin-packages-edit.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
                                <button name="update">Update</button>
                            </form>
                            <form action="../util/admin_package.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
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