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
        <h1>Edit Admin</h1>
        <?php
        $sql = "SELECT * FROM text WHERE text_id = 1";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) { ?>
            <form id="form-add" action="../util/admin_pages.php?text_id=<?php echo $row['text_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <label>Home Text</label>
                    <textarea name="home" maxlength="1000" required><?php echo $row['text_home']; ?></textarea>
                </div>
                <div class="form-item">
                    <label>About Text</label>
                    <textarea name="about" maxlength="1000" required><?php echo $row['text_about']; ?></textarea>
                </div>
                <div class="form-item">
                    <label>Team Information</label>
                    <textarea name="team" maxlength="1000" required><?php echo $row['text_team']; ?></textarea>
                </div>
                <div class="form-item">
                    <label>Services Page</label>
                    <textarea name="service" maxlength="1000" required><?php echo $row['text_service']; ?></textarea>
                </div>
                <div class="form-btn-grp">
                    <button id="add-new" name="update">Update</button>
                </div>
            </form>
        <?php };
        ?>
    </main>
    </div>
    <?php if (isset($_GET['pages_updated'])) {
        echo '<script>alert("Pages Updated")</script>';
    } ?>
</body>

</html>