<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Edit Venue</h1>

        <?php
        if (isset($_POST['update'])) {
            $sql = "SELECT * FROM venue WHERE venue_id = '{$_GET['venue_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <form action="../util/admin_venue.php?venue_id=<?php echo $row['venue_id']; ?>" method="post">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $row['venue_name']; ?>" required>
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $row['venue_add']; ?>" required>
                    <button name="update">Update</button>
                    <button><a href="admin-venues.php">Cancel</a></button>
                </form>
        <?php };
        } ?>

        <a id="back-btn" href="admin-venues.php">Back</a>

    </main>
    
</body>

</html>