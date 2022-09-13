<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <div id="view-window">
            <?php
            $id = $_GET['pkg_id'];
            if (isset($_POST['view'])) {
                $sql = "SELECT * FROM package WHERE pkg_id = $id";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <p>Package: <strong><?php echo $row['pkg_name']; ?></strong></p>
                    <p>Price: ₱<?php echo $row['pkg_price']; ?></p>
                    <p id="remark">Description: <br>
                        <i><?php echo $row['pkg_desc']; ?></i>
                    </p>
                    <div id="display-image">
                        <?php ?>
                            <img src="../images/package/<?php echo $row['pkg_img']; ?>">
                        <?php ?>
                    </div>
            <?php };
            } ?>
            <div id="button-grp">
                <a href="admin-packages.php"><button id="back">
                        <- Back</button></a>
            </div>
        </div>
    </main>
    </div>
</body>

</html>