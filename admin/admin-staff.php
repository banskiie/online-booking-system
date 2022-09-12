<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-lower.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Staff</h1>
        <a href="admin-staff-add.php"><button id="add">Add New Staff</button></a>
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
                        <td class="btn">
                            <form action="admin-staff-edit.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                <button id="update" name="update">Update</button>
                            </form>
                        </td>
                        <td class="btn">
                            <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
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