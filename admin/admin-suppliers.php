<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Suppliers</h1>
        <button><a href="admin-suppliers-add.php">Add New Supplier</a></button>
        <table>
            <tr>
                <th>Role</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th></th>
            </tr>
            <?php
            require '../db/database.php';
            $sql = "SELECT * FROM supplier";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['supp_role']; ?></td>
                        <td><?php echo $row['supp_name']; ?></td>
                        <td><?php echo $row['supp_email']; ?></td>
                        <td><?php echo $row['supp_contno']; ?></td>
                        <td><?php echo $row['supp_add']; ?></td>
                        <td>
                            <form action="admin-suppliers-edit.php?supp_id=<?php echo $row['supp_id']; ?>" method="post">
                                <button name="update">Update</button>
                            </form>
                            <form action="../util/admin_supplier.php?supp_id=<?php echo $row['supp_id']; ?>" method="post">
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