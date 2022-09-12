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
        <h1>Edit Suppliers</h1>
        <?php
        if (isset($_POST['update'])) {
            $sql = "SELECT * FROM supplier WHERE supp_id = '{$_GET['supp_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <form action="../util/admin_supplier.php?supp_id=<?php echo $row['supp_id']; ?>" method="post">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $row['supp_name']; ?>" required>
                    <label>Contact Number</label>
                    <input type="text" name="contno" value="<?php echo $row['supp_contno']; ?>" required>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['supp_email']; ?>" required>
                    <label>Role</label>
                    <input type="text" name="role" value="<?php echo $row['supp_role']; ?>" required>
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['supp_add']; ?>" required>
                    <button name="update">Update</button>
                    <button><a href="admin-suppliers.php">Cancel</a></button>
                </form>
        <?php };
        } ?>
    </main>
    </div>
</body>

</html>