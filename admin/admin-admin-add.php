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
        <h1>Add New Admin</h1>
        <form id="form-add" action="../util/admin_admin.php" method="post" enctype="multipart/form-data">
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
                <label>Password</label>
                <input name="password" type="password" maxlength="50" required>
            </div>
            <div class="form-item">
                <label>Confirm Password</label>
                <input name="confirm_password" type="password" maxlength="50" required>
            </div>
            <div class="form-btn-grp">
                <button id="add-new" name="add">Add</button>
                <a id="cancel" href="admin-admin.php">Cancel</a>
            </div>
        </form>
        <?php if (isset($_GET['password_not_the_same'])) {
            echo '<script>alert("Password is not the same!")</script>';
        } ?>
        <?php if (isset($_GET['sql_error'])) {
            echo '<script>alert("SQL Error!")</script>';
        } ?>
        <?php if (isset($_GET['email_already_taken'])) {
            echo '<script>alert("Email already taken!")</script>';
        } ?>
        <?php if (isset($_GET['success'])) {
            echo '<script>alert("Account registered!")</script>';
        } ?>
    </main>
    </div>
</body>

</html>