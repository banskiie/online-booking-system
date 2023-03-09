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
        <h1>Edit Staff</h1>
        <?php
        $sql = "SELECT * FROM staff WHERE staff_id = '{$_GET['staff_id']}'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) { ?>
            <form id="form-add" action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>Staff Picture</label>
                    <input type="file" name="uploadfile" value='<?php echo $row['staff_img']; ?>' required>
                    <button id="add-new" name="update-pic">Update</button>
                </div>
            </form>
            <form id="form-add" action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>First Name</label>
                    <input type="text" name="fn" value="<?php echo $row['staff_fn']; ?>" maxlength="50" required>
                </div>
                <div class="form-item">
                    <label>Middle Name</label>
                    <input type="text" name="mn" value="<?php echo $row['staff_mn']; ?>" maxlength="50">
                </div>
                <div class="form-item">
                    <label>Last Name</label>
                    <input type="text" name="ln" value="<?php echo $row['staff_ln']; ?>" maxlength="50" required>
                </div>
                <div class="form-item">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['staff_email']; ?>" maxlength="100" required>
                </div>
                <div class="form-item">
                    <label>Contact Number</label>
                    <input type="text" name="contno" value="<?php echo $row['staff_contno']; ?>" maxlength="11" required>
                </div>
                <div class="form-item">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['staff_add']; ?>" maxlength="100" required>
                </div>
                <div class="form-item">
                    <label>Position</label>
                    <input type="text" name="position" value="<?php echo $row['staff_pos']; ?>" maxlength="50" required>
                </div>
                <div class="form-btn-grp">
                    <button id="add-new" name="update">Update</button>
                    <a id="cancel" href="admin-staff.php">Cancel</a>
                </div>
            </form>
        <?php };
        ?>
    </main>
    </div>
</body>

</html>