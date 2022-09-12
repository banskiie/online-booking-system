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
            $sql = "SELECT * FROM client WHERE clnt_id = '{$_GET['clnt_id']}'";
            $result = $conn->query($sql);
            if ($row = $result->fetch_assoc()) { ?>
                <h1><?php echo $row['clnt_fn']; ?> 
                <?php echo $row['clnt_mn']; ?> 
                <?php echo $row['clnt_ln']; ?></h1>
                <p>Email: <strong><?php echo $row['clnt_email']; ?> </strong></p>
                <p>Contact Number: <strong><?php echo $row['clnt_contno']; ?> </strong></p>
                <p>Address:<strong><?php echo $row['clnt_add']; ?> </strong> </p>
        <?php }
        } ?>

        <a href="admin-clients.php">Back</a>

    </main>
    </div>
</body>

</html>