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
        <h1>Add Supplier</h1>
        <form id="add-form" action="../util/admin_supplier.php" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label>Supplier Picture</label>
                <input type="file" name="uploadfile" required>
            </div>
            <div class="form-item">
                <label>Name</label>
                <input type="text" name="name" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Contact Number</label>
                <input type="text" name="contno" maxlength="11" required>
            </div>
            <div class="form-item">
                <label>Email</label>
                <input type="email" name="email" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Role</label>
                <input type="text" name="role" maxlength="50" required>
            </div>
            <div class="form-item">
                <label>Address</label>
                <input type="text" name="address" maxlength="100" required>
            </div>
            <div class="form-btn-grp">
                <button id="add-new" name="add">Add</button>
                <a id="cancel" href="admin-suppliers.php">Cancel</a>
            </div>
        </form>
    </main>
    </div>
</body>

</html>