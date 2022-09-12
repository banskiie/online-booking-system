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
        <form id="add-form" action="../util/admin_supplier.php" method="post">

            <div class="form-item">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-item">
                <label>Contact Number</label>
                <input type="text" name="contno" required>
            </div>
            <div class="form-item">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-item">
                <label>Role</label>
                <input type="text" name="role" required>
            </div>
            <div class="form-item">
                <label>Address</label>
                <input type="text" name="address" required>
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