<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
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
            require '../db/database.php';
            if (isset($_POST['view'])) {
                $sql = "SELECT * FROM inquiry WHERE inq_id = '{$_GET['inq_id']}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <p>Name: <strong><?php echo $row['inq_name']; ?></strong></p>
                    <p>Email: <?php echo $row['inq_email']; ?></p>
                    <p>Contact Number: <?php echo $row['inq_contno']; ?></p>
                    <p id="remark">Remark: <br>
                        <i><?php echo $row['inq_remark']; ?></i>
                    </p>
            <?php }
                $sql = "UPDATE inquiry SET inq_status=true WHERE inq_id='{$_GET['inq_id']}'";
                mysqli_query($conn, $sql);
            } ?>
            <div id="button-grp">
                <a href="admin-inq.php"><button id="back">
                        <- Back</button></a>
            </div>
        </div>
    </main>
    </div>

</body>

</html>