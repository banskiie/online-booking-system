<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
require '../db/database.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-lower.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Staff</h1>
        <form id="top-form" action="admin-staff.php" method="GET">
            <div><button name="search-submit" id="search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
                <input name="search" type="text">
            </div>

            <a href="admin-staff-add.php">
                <button type="button" id="add">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Add
                </button>
            </a>
        </form>
        <div class="tbl-cont">
            <table>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th></th>
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
                        $no_of_records_per_page = 6;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM staff WHERE staff_status=1";
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM staff WHERE staff_status=1 ORDER BY staff_pos ASC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <div id="small-icon">
                                        <?php if ($row['staff_img'] == NULL) { ?>
                                            <img src="../images/staff/default.jpg">
                                        <?php } else { ?>
                                            <img src="../images/staff/<?php echo $row['staff_img']; ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $row['staff_fn']; ?></td>
                                <td><?php echo $row['staff_mn']; ?></td>
                                <td><?php echo $row['staff_ln']; ?></td>
                                <td><?php echo $row['staff_email']; ?></td>
                                <td><?php echo $row['staff_contno']; ?></td>
                                <td><?php echo $row['staff_add']; ?></td>
                                <td><?php echo $row['staff_pos']; ?></td>
                                <td class="btn">
                                    <form action="admin-staff-edit.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                        <button id="update" name="update">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="btn">
                                    <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                        <button id="delete" name="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
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

                        $no_of_records_per_page = 6;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM staff WHERE (staff_fn LIKE '%$queried%' OR staff_mn LIKE '%$queried%' OR staff_ln LIKE '%$queried%' OR staff_email LIKE '%$queried%' OR staff_contno LIKE '%$queried%' OR staff_add LIKE '%$queried%' OR staff_pos LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $total_pages_sql .= " OR staff_fn LIKE '%$k%' OR staff_mn LIKE '%$k%' OR staff_ln LIKE '%$k%' OR staff_email LIKE '%$k%' OR staff_contno LIKE '%$k%' OR staff_add LIKE '%$k%' OR staff_pos LIKE '%$k%'";
                        }
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM staff WHERE (staff_fn LIKE '%$queried%' OR staff_mn LIKE '%$queried%' OR staff_ln LIKE '%$queried%' OR staff_email LIKE '%$queried%' OR staff_contno LIKE '%$queried%' OR staff_add LIKE '%$queried%' OR staff_pos LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR staff_fn LIKE '%$k%' OR staff_mn LIKE '%$k%' OR staff_ln LIKE '%$k%' OR staff_email LIKE '%$k%' OR staff_contno LIKE '%$k%' OR staff_add LIKE '%$k%' OR staff_pos LIKE '%$k%'";
                        }
                        $sql .= "AND staff_status=1 LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) { ?>
                            <tr>
                                <td>
                                    <div id="small-icon">
                                        <?php if ($row['staff_img'] == NULL) { ?>
                                            <img src="../images/staff/default.jpg">
                                        <?php } else { ?>
                                            <img src="../images/staff/<?php echo $row['staff_img']; ?>">
                                        <?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $row['staff_fn']; ?></td>
                                <td><?php echo $row['staff_mn']; ?></td>
                                <td><?php echo $row['staff_ln']; ?></td>
                                <td><?php echo $row['staff_email']; ?></td>
                                <td><?php echo $row['staff_contno']; ?></td>
                                <td><?php echo $row['staff_add']; ?></td>
                                <td><?php echo $row['staff_pos']; ?></td>
                                <td class="btn">
                                    <form action="admin-staff-edit.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                        <button id="update" name="update">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="btn">
                                    <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                        <button id="delete" name="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
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
                    $no_of_records_per_page = 6;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM staff WHERE staff_status=1";
                    $result = mysqli_query($conn, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM staff WHERE staff_status=1 ORDER BY staff_pos ASC LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res_data)) { ?>
                        <tr>
                            <td>
                                <div id="small-icon">
                                    <?php if ($row['staff_img'] == NULL) { ?>
                                        <img src="../images/staff/default.jpg">
                                    <?php } else { ?>
                                        <img src="../images/staff/<?php echo $row['staff_img']; ?>">
                                    <?php } ?>
                                </div>
                            </td>
                            <td><?php echo $row['staff_fn']; ?></td>
                            <td><?php echo $row['staff_mn']; ?></td>
                            <td><?php echo $row['staff_ln']; ?></td>
                            <td><?php echo $row['staff_email']; ?></td>
                            <td><?php echo $row['staff_contno']; ?></td>
                            <td><?php echo $row['staff_add']; ?></td>
                            <td><?php echo $row['staff_pos']; ?></td>
                            <td class="btn">
                                <form action="admin-staff-edit.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                    <button id="update" name="update">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="btn">
                                <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                    <button id="delete" name="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
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
                    <li>
                        <a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=1" ?> ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno - 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . ($pageno + 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    <li><a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . $total_pages ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="pagination">
                <ul>
                    <li><a href="?pageno=1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                            </svg>
                        </a></li>
                    <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } ?>
    </main>
    </div>
</body>

</html>