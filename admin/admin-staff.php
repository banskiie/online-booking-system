<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Staff</h1>
        <button><a href="admin-staff-add.php">Add New Staff</a></button>
        <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Position</th>
                <th></th>
            </tr>
            <?php
            $sql = "SELECT * FROM staff";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['staff_fn']; ?></td>
                        <td><?php echo $row['staff_mn']; ?></td>
                        <td><?php echo $row['staff_ln']; ?></td>
                        <td><?php echo $row['staff_email']; ?></td>
                        <td><?php echo $row['staff_contno']; ?></td>
                        <td><?php echo $row['staff_add']; ?></td>
                        <td><?php echo $row['staff_pos']; ?></td>
                        <td>
                            <form action="admin-staff-edit.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                <button name="update">Update</button>
                            </form>
                            <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
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