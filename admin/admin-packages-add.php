<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Add Package</h1>
        <form action="../util/admin_package.php" method="post">
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Price</label>
            <input type="number" name="price" min="0.00" max="100000.00" step="0.10" required />
            <label>Description</label>
            <textarea name="desc"></textarea>
            <button name="add">Add</button>
            <button><a href="admin-packages.php">Cancel</a></button>
        </form>
    </main>
    </div>
</body>

</html>