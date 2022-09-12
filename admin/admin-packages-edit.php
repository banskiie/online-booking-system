<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        
        <h1>Edit Package</h1>
        
            <?php
            require '../db/database.php';
            if (isset($_POST['update'])) {
                $sql = "SELECT * FROM package WHERE pkg_id = '{$_GET['pkg_id']}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <form action="../util/admin_package.php?pkg_id=<?php echo $row['pkg_id']; ?>" method="post">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $row['pkg_name']; ?>" required>
                        <label>Price</label>
                        <input type="number" name="price" min="0.00" max="100000.00" step="0.10" value="<?php echo $row['pkg_price']; ?>" required />
                        <label>Description</label>
                        <textarea name="desc"><?php echo $row['pkg_desc']; ?></textarea>
                        <button name="update">Update</button>
                        <button><a href="admin-packages.php">Cancel</a></button>
                    </form>
            <?php };
            } ?>
            <a id="back-btn" href="admin-packages.php">Back</a>
        
        </main>
       
</body>

</html>