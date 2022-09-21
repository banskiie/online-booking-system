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
        <h1>Add Staff</h1>
        <form id="form-add" action="../util/admin_staff.php" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label>Staff Picture</label>
                <input type="file" name="uploadfile">
            </div>
            <div class="form-item">
                <label>First Name</label>
                <input type="text" name="fn" maxlength="50" required>
            </div>
            <div class="form-item">
                <label>Middle Name</label>
                <input type="text" name="mn" maxlength="50">
            </div>
            <div class="form-item">
                <label>Last Name</label>
                <input type="text" name="ln" maxlength="50" required>
            </div>
            <div class="form-item">
                <label>Email</label>
                <input type="email" name="email" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Contact Number</label>
                <input type="text" name="contno" maxlength="11" required>
            </div>
            <div class="form-item">
                <label>Address</label>
                <input type="text" name="address" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Position</label>
                <input type="text" name="position" maxlength="50" required>
            </div>
            <div class="form-btn-grp">
                <button id="add-new" name="add">Add</button>
                <a id="cancel" href="admin-staff.php">Cancel</a>
            </div>
        </form>
    </main>
    </div>
</body>

</html>