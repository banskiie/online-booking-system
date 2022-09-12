<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Add Supplier</h1>
        <form action="../util/admin_supplier.php" method="post">
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Contact Number</label>
            <input type="text" name="contno" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Role</label>
            <input type="text" name="role" required>
            <label>Address</label>
            <input type="text" name="address" required>
            <button name="add">Add</button>
            <button><a href="admin-suppliers.php">Cancel</a></button>
        </form>
    </main>
    </div>
</body>
</html>