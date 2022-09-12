<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <?php
        require '../db/database.php';
        if (isset($_POST['view'])) {
            $sql = "SELECT * FROM package WHERE pkg_id = '{$_GET['pkg_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <h1>Package: <strong><?php echo $row['pkg_name']; ?></strong></h1>
                <p>Price: <?php echo $row['pkg_price']; ?></p>
                <p>Description: <br>
                    <?php echo $row['pkg_desc']; ?>
                </p>
        <?php };
        } ?>
        <a href="admin-packages.php">Back</a>
    </main>
    </div>
</body>

</html>