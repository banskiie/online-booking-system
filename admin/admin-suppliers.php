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
        <h1>Suppliers</h1>
        <a href="admin-suppliers-add.php"><button id="add">Add New Supplier</button></a>
        <div class="tbl-cont">
            <table>
                <tr>
                    <th></th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                require '../db/database.php';
                $sql = "SELECT * FROM supplier WHERE supp_status=1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <div id="small-icon">
                                    <?php if ($row['supp_img'] == NULL) { ?>
                                        <img src="../images/supplier/default.jpg">
                                    <?php } else { ?>
                                        <img src="../images/supplier/<?php echo $row['supp_img']; ?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td><?php echo $row['supp_role']; ?></td>
                            <td><?php echo $row['supp_name']; ?></td>
                            <td><?php echo $row['supp_email']; ?></td>
                            <td><?php echo $row['supp_contno']; ?></td>
                            <td><?php echo $row['supp_add']; ?></td>
                            <td class="btn">
                                <form action="admin-suppliers-edit.php?supp_id=<?php echo $row['supp_id']; ?>" method="post">
                                    <button id="update" name="update">Update</button>
                                </form>
                            </td>
                            <td class="btn">
                                <form action="../util/admin_supplier.php?supp_id=<?php echo $row['supp_id']; ?>" method="post">
                                    <button id="delete" name="delete">Delete</button>
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