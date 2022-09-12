<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>View Inquiry</h1>
        <?php
        require '../db/database.php';
        if (isset($_POST['view'])) {
            $sql = "SELECT * FROM inquiry WHERE inq_id = '{$_GET['inq_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <p>Name: <strong><?php echo $row['inq_name']; ?></strong></p>
                <p>Email: <?php echo $row['inq_email']; ?></p>
                <p>Contact Number: <?php echo $row['inq_contno']; ?></p>
                <p>Remark: <br>
                    <?php echo $row['inq_remark']; ?>
                </p>
        <?php }
            $sql = "UPDATE inquiry SET inq_status=true WHERE inq_id='{$_GET['inq_id']}'";
            mysqli_query($conn, $sql);
        } ?>
        <a href="admin-inq.php">Back</a>
    </main>
    </div>
</body>

</html>