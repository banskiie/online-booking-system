<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Add Venue</h1>
        <form action="../util/admin_venue.php" method="post">
            <label>Venue Name</label>
            <input type="text" name="name" required>
            <label>Venue Address</label>
            <input type="text" name="address" required>
            <button name="add">Add</button>
            <button><a href="admin-venues.php">Cancel</a></button>
        </form>
    </main>
    </div>
</body>
</html>