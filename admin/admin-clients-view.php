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
            if (isset($_POST['view'])) {
                $id = $_GET['clnt_id'];
                $sql = "SELECT * FROM client WHERE clnt_id = $id";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <p>First Name: <strong><?php echo $row['clnt_fn']; ?> </strong></p>
                    <p>Middle Name: <strong><?php echo $row['clnt_mn']; ?> </strong></p>
                    <p>Last Name: <strong><?php echo $row['clnt_ln']; ?> </strong></p>
                    <p>Email: <strong><?php echo $row['clnt_email']; ?> </strong></p>
                    <p>Contact Number: <strong><?php echo $row['clnt_contno']; ?> </strong></p>
                    <p>Address:<strong><?php echo $row['clnt_add']; ?> </strong> </p>
            <?php }
            } ?>
            <div id="button-grp">
                <a href="admin-clients.php"><button id="back">
                        <- Back</button></a>
            </div>
        </div>


    </main>
    </div>
</body>

</html>