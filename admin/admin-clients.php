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
        <h1>Client List</h1>
        <form action="admin-clients.php" method="GET">
            <input name="search" type="text">
            <button name="search-submit" id="search"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
        <div class="tbl-cont">
            <table>
                <tr>
                    <th></th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <?php
                if (isset($_GET['search-submit'])) {
                    $queried = mysqli_real_escape_string($conn, preg_replace('/\s+/', ' ', trim($_GET['search'])));
                    if (strpos($queried, ", ")) {
                        $query = str_replace(", ", " ", $queried);
                        $keys = explode(" ", $query);
                    } else if (strpos($queried, ",")) {
                        $query = str_replace(",", " ", $queried);
                        $keys = explode(" ", $query);
                    } else {
                        $keys = explode(" ", $queried);
                    }
                    if (empty($queried)) {
                        unset($_COOKIE["search"]);
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 8;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM client ORDER BY clnt_fn ASC";
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM client ORDER BY clnt_fn ASC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <div id="small-icon">
                                        <?php if ($row['clnt_img'] == NULL) { ?>
                                            <img src="../images/client/default.jpg">
                                        <?php } else { ?>
                                            <img src="../images/client/<?php echo $row['clnt_img']; ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $row['clnt_ln']; ?></td>
                                <td><?php echo $row['clnt_fn']; ?></td>
                                <td><?php echo $row['clnt_email']; ?></td>
                                <td class="btn">
                                    <form action="admin-clients-view.php?clnt_id=<?php echo $row['clnt_id']; ?>" method="post">
                                        <button name="view" id="view">View</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        $_COOKIE['search'] = $queried;
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 8;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM client WHERE (clnt_fn LIKE '%$queried%' OR clnt_ln LIKE '%$queried%' OR clnt_email LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $total_pages_sql .= " OR clnt_fn LIKE '%$k%' OR clnt_ln LIKE '%$k%' OR clnt_email LIKE '%$k%'";
                        }
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM client WHERE (clnt_fn LIKE '%$queried%' OR clnt_ln LIKE '%$queried%' OR clnt_email LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR clnt_fn LIKE '%$k%' OR clnt_ln LIKE '%$k%' OR clnt_email LIKE '%$k%'";
                        }
                        $sql .= "LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <div id="small-icon">
                                        <?php if ($row['clnt_img'] == NULL) { ?>
                                            <img src="../images/client/default.jpg">
                                        <?php } else { ?>
                                            <img src="../images/client/<?php echo $row['clnt_img']; ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $row['clnt_ln']; ?></td>
                                <td><?php echo $row['clnt_fn']; ?></td>
                                <td><?php echo $row['clnt_email']; ?></td>
                                <td class="btn">
                                    <form action="admin-clients-view.php?clnt_id=<?php echo $row['clnt_id']; ?>" method="post">
                                        <button name="view" id="view">View</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    };
                } else {
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM client ORDER BY clnt_fn ASC";
                    $result = mysqli_query($conn, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM client ORDER BY clnt_fn ASC LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res_data)) { ?>
                        <tr>
                            <td>
                                <div id="small-icon">
                                    <?php if ($row['clnt_img'] == NULL) { ?>
                                        <img src="../images/client/default.jpg">
                                    <?php } else { ?>
                                        <img src="../images/client/<?php echo $row['clnt_img']; ?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td><?php echo $row['clnt_ln']; ?></td>
                            <td><?php echo $row['clnt_fn']; ?></td>
                            <td><?php echo $row['clnt_email']; ?></td>
                            <td class="btn">
                                <form action="admin-clients-view.php?clnt_id=<?php echo $row['clnt_id']; ?>" method="post">
                                    <button name="view" id="view">View</button>
                                </form>
                            </td>
                        </tr>

                <?php };
                }
                ?>
            </table>
        </div>
        <?php if (!empty($_COOKIE['search'])) { ?>
            <div class="pagination">
                <ul>
                    <li><a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=1" ?> ">First</a></li>
                    <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno - 1);
                                    } ?>">Prev</a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno + 1);
                                    } ?>">Next</a>
                    </li>

                    <li><a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . $total_pages ?>">Last</a></li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="pagination">
                <ul>
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>">Prev</a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
            </div>
        <?php } ?>
    </main>
    </div>
</body>

</html>