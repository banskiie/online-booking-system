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
        <h1>Edit Supplier</h1>
        <?php

        $sql = "SELECT * FROM supplier WHERE supp_id = '{$_GET['supp_id']}'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) { ?>
            <form id="add-form" action="../util/admin_supplier.php?supp_id=<?php echo $row['supp_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>Staff Picture</label>
                    <input type="file" name="uploadfile" value='<?php echo $row['supp_img']; ?>'required>
                    <button id="add-new" name="update-pic">Update</button>
                </div>
            </form>
            <form id="add-form" action="../util/admin_supplier.php?supp_id=<?php echo $row['supp_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $row['supp_name']; ?>" maxlength="100" required>
                </div>
                <div class="form-item">
                    <label>Contact Number</label>
                    <input type="text" name="contno" value="<?php echo $row['supp_contno']; ?>" maxlength="11" required>
                </div>
                <div class="form-item">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['supp_email']; ?>" maxlength="100" required>
                </div>
                <div class="form-item">
                    <label>Role</label>
                    <input type="text" name="role" value="<?php echo $row['supp_role']; ?>" maxlength="50" required>
                </div>
                <div class="form-item">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['supp_add']; ?>" maxlength="100" required>
                </div>
                <div class="form-btn-grp">
                    <button id="add-new" name="update">Update</button>
                    <a id="cancel" href="admin-suppliers.php">Cancel</a>
                </div>
            </form>
        <?php };
        ?>
    </main>
    </div>
</body>

</html>