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
                    <p><i>Name:</i> <strong><?php echo $row['venue_name']; ?></strong></p>
                    <p><i>Address:</i> <?php echo $row['venue_add']; ?></p>
                    <p><i>Capacity:</i> <strong><?php echo $row['venue_cap']; ?></strong></p>
                    <p><i>Description:</i> <?php echo $row['venue_desc']; ?></p>
                    <div id="display-image">
                        <img src="../images/venue/<?php echo $row['venue_img']; ?>">
                    </div>
            <?php };
            } ?>
            <div id="button-grp">
                <a href="admin-venues.php"><button id="back">
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