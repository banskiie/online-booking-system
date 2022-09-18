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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </button></a>
            </div>
        </div>
    </main>
    </div>
</body>

</html>