<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Add Staff</h1>
        <form action="../util/admin_staff.php" method="post">
            <label>First Name</label>
            <input type="text" name="fn" required>
            <label>Middle Name</label>
            <input type="text" name="mn" required>
            <label>Last Name</label>
            <input type="text" name="ln" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Contact Number</label>
            <input type="text" name="contno" required>
            <label>Address</label>
            <input type="text" name="address" required>
            <label>Position</label>
            <input type="text" name="position" required>
            <button name="add">Add</button>
            <button><a href="admin-staff.php">Cancel</a></button>
        </form>
    </main>
    </div>
</body>
</html>