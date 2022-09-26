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
        <h1>Edit Admin</h1>
        <?php
        $id = $_GET['admin_id'];
        $sql = "SELECT * FROM admin WHERE admin_id = $id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) { ?>
            <form id="form-add" action="../util/admin_admin.php?admin_id=<?php echo $row['admin_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>First Name</label>
                    <input type="text" name="fn" value="<?php echo $row['admin_fn']; ?>" maxlength="50" required>
                </div>
                <div class="form-item">
                    <label>Middle Name</label>
                    <input type="text" name="mn" value="<?php echo $row['admin_mn']; ?>" maxlength="50">
                </div>
                <div class="form-item">
                    <label>Last Name</label>
                    <input type="text" name="ln" value="<?php echo $row['admin_ln']; ?>" maxlength="50" required>
                </div>
                <div class="form-item">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['admin_email']; ?>" maxlength="100" required>
                </div>
                <div class="form-item">
                    <label>Contact Number</label>
                    <input type="text" name="contno" value="<?php echo $row['admin_contno']; ?>" maxlength="11" required>
                </div>
                <div class="form-btn-grp">
                    <button id="add-new" name="update">Update</button>
                    <a id="cancel" href="admin-admin.php">Cancel</a>
                </div>
            </form>
            <?php if (isset($_GET['sql_error'])) {
                echo '<script>alert("SQL Error!")</script>';
            } ?>
            <?php if (isset($_GET['email_already_taken'])) {
                echo '<script>alert("Email already taken!")</script>';
            } ?>
        <?php };
        ?>
    </main>
    </div>
</body>

</html>