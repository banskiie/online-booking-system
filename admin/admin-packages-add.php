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
        <h1>Add Package</h1>
        <form id="add-form" action="../util/admin_package.php" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label>Name</label>
                <input type="text" name="name" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Price</label>
                <input type="number" name="price" min="0.00" max="100000.00" step="0.10" required />
            </div>
            <div class="form-item">
                <label>Description</label>
                <textarea name="desc" maxlength="255" required></textarea>
            </div>
            <div class="form-item">
                <label>Package Image</label>
                <input type="file" name="uploadfile" required>
            </div>
            <div class="form-btn-grp">
                <button id="add-new" name="add">Add</button>
                <a id="cancel" href="admin-packages.php">Cancel</a>
            </div>
        </form>
    </main>
    </div>
</body>

</html>