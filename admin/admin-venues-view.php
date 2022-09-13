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
            $id = $_GET['venue_id'];
            if (isset($_POST['view'])) {
                $sql = "SELECT * FROM venue WHERE venue_id = $id";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { ?>
                    <p>Name: <strong><?php echo $row['venue_name']; ?></strong></p>
                    <p>Address: <?php echo $row['venue_add']; ?></p>
                    <div id="display-image">
                        <?php ?>
                            <img src="../images/venue/<?php echo $row['venue_img']; ?>">
                        <?php ?>
                    </div>
            <?php };
            } ?>
            <div id="button-grp">
                <a href="admin-venues.php"><button id="back">
                        <- Back</button></a>
            </div>
        </div>
    </main>
    </div>
</body>

</html>