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
        <h1>Inquiries</h1>
        <form action="admin-inq.php" method="GET">
            <input name="search" type="text">
            <button name="search-submit" id="search"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
        <div class="tbl-cont">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                <?php
                if (isset($_GET['search-submit'])) {
                    $queried = mysqli_real_escape_string($conn, preg_replace('/\s+/', ' ', trim($_GET['search'])));
                    if (empty($queried)) {
                        $sql = "SELECT * FROM inquiry";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['inq_name']; ?></td>
                                    <td><?php echo $row['inq_email']; ?></td>
                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post" enctype="multipart/form-data">
                                            <button id="view" name="view">View</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        }
                    } else {
                        if (strpos($queried, ", ")) {
                            $query = str_replace(", ", " ", $queried);
                            $keys = explode(" ", $query);
                        } else if (strpos($queried, ",")) {
                            $query = str_replace(",", " ", $queried);
                            $keys = explode(" ", $query);
                        } else {
                            $keys = explode(" ", $queried);
                        }
                        $sql = "SELECT * FROM inquiry WHERE (inq_name LIKE '%$queried%' OR inq_email LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR inq_name LIKE '%$k%' OR inq_email LIKE '%$k%' ";
                        }
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['inq_name']; ?></td>
                                    <td><?php echo $row['inq_email']; ?></td>
                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post" enctype="multipart/form-data">
                                            <button id="view" name="view">View</button>
                                        </form>
                                    </td>
                                </tr>
                    <?php }
                        };
                    }
                } else { ?>
                    <?php
                    $sql = "SELECT * FROM inquiry";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['inq_name']; ?></td>
                                <td><?php echo $row['inq_email']; ?></td>
                                <td class="btn">
                                    <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post" enctype="multipart/form-data">
                                        <button id="view" name="view">View</button>
                                    </form>
                                </td>
                            </tr>

                <?php };
                    }
                } ?>


            </table>
        </div>
    </main>
    </div>
</body>

</html>