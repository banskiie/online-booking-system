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
        <h1>Packages</h1>
        <a href="admin-packages-add.php"><button id="add">Add New Package</button></a>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
            $sql = "SELECT * FROM package";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['pkg_name']; ?></td>
                        <td>₱<?php echo $row['pkg_price']; ?></td>
                        <td class="btn">
                            <form action="admin-packages-view.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
                                <button id="view" name="view">View</button>
                            </form>
                        </td>
                        <td class="btn">
                            <form action="admin-packages-edit.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
                                <button id="update" name="update">Update</button>
                            </form>
                        </td>
                        <td class="btn">
                            <form action="../util/admin_package.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
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