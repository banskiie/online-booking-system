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

        <h1>Edit Package</h1>

        <?php
        if (isset($_POST['update'])) {
            $sql = "SELECT * FROM package WHERE pkg_id = '{$_GET['pkg_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <form id="add-form" action="../util/admin_package.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-item">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $row['pkg_name']; ?>" maxlength="100" required>
                    </div>
                    <div class="form-item">
                        <label>Price</label>
                        <input type="number" name="price" min="0.00" max="100000.00" step="0.10" value="<?php echo $row['pkg_price']; ?>" required />
                    </div>
                    <div class="form-item">
                        <label>Description</label>
                        <textarea name="desc" maxlength="255"><?php echo $row['pkg_desc']; ?></textarea>
                    </div>
                    <div class="form-item">
                        <label>Package Image</label>
                        <input type="file" name="uploadfile" required>
                    </div>
                    <div class="form-btn-grp">
                        <button id="add-new" name="update">Update</button>
                        <a id="cancel" href="admin-packages.php">Cancel</a>
                    </div>
                </form>
        <?php };
        } ?>
        <a id="back-btn" href="admin-packages.php">Back</a>
    </main>
</body>

</html>