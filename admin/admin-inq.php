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
        <div class="tbl-cont">
            <table style="width: 80vw;">
                <tr>
                    <th style="width: 12vw;">Time</th>
                    <th style="width: 10vw;">Name</th>
                    <th style="width: 15vw;">Email</th>
                    <th style="width: 35vw;">Text</th>
                    <th style="width: 3vw;"></th>
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
                        $no_of_records_per_page = 10;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM inquiry";
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM inquiry ORDER BY inq_datetime DESC LIMIT $offset, $no_of_records_per_page ";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) {
                            if ($row['inq_status'] == 0) { ?>
                                <tr>
                                    <td><i><b>
                                                <?php $date_time = new DateTime($row['inq_datetime']);
                                                $formated_date = $date_time->format('jS F Y h:i:s A');
                                                echo $formated_date;
                                                ?>
                                            </b></i></td>
                                    <td>*<i><b>
                                                <?php echo $row['inq_name']; ?>
                                            </b></i></td>
                                    <td><i>
                                            <?php echo $row['inq_email']; ?>
                                        </i></td>
                                    <td>
                                        <?php echo substr($row['inq_remark'], 0, 50); ?>
                                    </td>

                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                            enctype="multipart/form-data">
                                            <button id="view" name="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        <?php $date_time = new DateTime($row['inq_datetime']);
                                        $formated_date = $date_time->format('jS F Y h:i:s A');
                                        echo $formated_date;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['inq_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['inq_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo substr($row['inq_remark'], 0, 50); ?>
                                    </td>
                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                            enctype="multipart/form-data">
                                            <button id="view" name="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        }
                    } else {
                        $_COOKIE['search'] = $queried;
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records_per_page = 10;
                        $offset = ($pageno - 1) * $no_of_records_per_page;

                        $total_pages_sql = "SELECT COUNT(*) FROM inquiry WHERE (inq_name LIKE '%$queried%' OR inq_email LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $total_pages_sql .= " OR inq_name LIKE '%$k%' OR inq_email LIKE '%$k%' ";
                        }
                        $result = mysqli_query($conn, $total_pages_sql);
                        $total_rows = mysqli_fetch_array($result)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $sql = "SELECT * FROM inquiry WHERE (inq_name LIKE '%$queried%' OR inq_email LIKE '%$queried%')";
                        foreach ($keys as $k) {
                            $sql .= " OR inq_name LIKE '%$k%' OR inq_email LIKE '%$k%'";
                        }
                        $sql .= " ORDER BY inq_datetime DESC LIMIT $offset, $no_of_records_per_page";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) {
                            if ($row['inq_status'] == 0) { ?>
                                <tr>
                                    <td><i><b>
                                                <?php $date_time = new DateTime($row['inq_datetime']);
                                                $formated_date = $date_time->format('D h:i:s A [d M y]');
                                                echo $formated_date;
                                                ?>
                                            </b></i></td>
                                    <td>*<i><b>
                                                <?php echo $row['inq_name']; ?>
                                            </b></i></td>
                                    <td><i>
                                            <?php echo $row['inq_email']; ?>
                                        </i></td>
                                    <td>
                                        <?php echo substr($row['inq_remark'], 0, 50); ?>
                                    </td>
                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                            enctype="multipart/form-data">
                                            <button id="view" name="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        <?php $date_time = new DateTime($row['inq_datetime']);
                                        $formated_date = $date_time->format('D h:i:s A [d M y]');
                                        echo $formated_date;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['inq_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['inq_email']; ?>
                                    </td>
                                    <td>
                                        <?php echo substr($row['inq_remark'], 0, 50); ?>
                                    </td>
                                    <td class="btn">
                                        <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                            enctype="multipart/form-data">
                                            <button id="view" name="view">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        }
                    }
                    ;
                } else {
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 10;
                    $offset = ($pageno - 1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM inquiry ORDER BY inq_datetime DESC";
                    $result = mysqli_query($conn, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM inquiry ORDER BY inq_datetime DESC LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($res_data)) {
                        if ($row['inq_status'] == 0) { ?>
                            <tr>
                                <td><i><b>
                                            <?php $date_time = new DateTime($row['inq_datetime']);
                                            $formated_date = $date_time->format('D h:i:s A [d M y]');
                                            echo $formated_date;
                                            ?>
                                        </b></i></td>
                                <td>*<i><b>
                                            <?php echo $row['inq_name']; ?>
                                        </b></i></td>
                                <td><i>
                                        <?php echo $row['inq_email']; ?>
                                    </i></td>
                                <td>
                                    <?php echo substr($row['inq_remark'], 0, 50); ?>
                                </td>
                                <td class="btn">
                                    <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                        enctype="multipart/form-data">
                                        <button id="view" name="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td>
                                    <?php $date_time = new DateTime($row['inq_datetime']);
                                    $formated_date = $date_time->format('D h:i:s A [d M y]');
                                    echo $formated_date;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['inq_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['inq_email']; ?>
                                </td>
                                <td>
                                    <?php echo substr($row['inq_remark'], 0, 50); ?>
                                </td>
                                <td class="btn">
                                    <form action="admin-inq-view.php?inq_id=<?php echo $row['inq_id']; ?>" method="post"
                                        enctype="multipart/form-data">
                                        <button id="view" name="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        <?php }
                        ;
                    }
                }
                ?>


            </table>
        </div>
        <?php if (!empty($_COOKIE['search'])) { ?>
            <div class="pagination">
                <ul>
                    <li>
                        <a href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=1" ?> ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>

                    <li><a
                            href="<?php echo "?search=" . ($_COOKIE['search']) . "&search-submit=&pageno=" . $total_pages ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="pagination">
                <ul>
                    <li><a href="?pageno=1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        <?php } ?>
    </main>
    </div>
</body>

</html>