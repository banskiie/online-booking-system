<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-lower.css">
</head>

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
                <form id="add-form" action="../util/admin_venue.php?venue_id=<?php echo $row['venue_id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-item">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $row['venue_name']; ?>" required>
                    </div>
                    <div class="form-item">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $row['venue_add']; ?>" required>
                    </div>
                    <div class="form-item">
                        <label>Venue Image</label>
                        <input type="file" name="uploadfile" value='<?php echo $row['venue_img']; ?>' required>
                    </div>
                    <div class="form-btn-grp">
                        <button id="update" name="update">Update</button>
                        <a id="cancel" href="admin-venues.php">Cancel</a>
                    </div>
                </form>
        <?php };
        } ?>

        <a id="back-btn" href="admin-venues.php">Back</a>

    </main>
    <?php ?>

</body>

</html>