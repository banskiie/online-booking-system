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
        <h1>Add Venue</h1>
        <form id="add-form" action="../util/admin_venue.php" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label>Venue Name</label>
                <input type="text" name="name" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Venue Address</label>
                <input type="text" name="address" maxlength="100" required>
            </div>
            <div class="form-item">
                <label>Venue Capacity</label>
                <input type="number" name="capacity" min="0" max="9999" step="1" required />
            </div>
            <div class="form-item">
                <label>Venue Description</label>
                <textarea name="description" maxlength="255" required></textarea>
            </div>
            <div class="form-item">
                <label>Venue Image</label>
                <input type="file" name="uploadfile" required>
            </div>
            <div class="form-btn-grp">
                <button id="add-new" name="add">Add</button>
                <a id="cancel" href="admin-venues.php">Cancel</a>
            </div>
        </form>
    </main>
    </div>
</body>

</html>