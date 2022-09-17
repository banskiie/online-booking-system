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
        <a href="admin-staff-add.php"><button id="add">Add New Staff</button></a>
        <form action="admin-staff.php" method="GET">
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
                    if (empty($queried)) {
                        $sql = "SELECT * FROM staff WHERE staff_status=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
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
                                            <button id="update" name="update">Update</button>
                                        </form>
                                    </td>
                                    <td class="btn">
                                        <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                            <button id="delete" name="delete">Delete</button>
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
                        $sql = "SELECT * FROM staff WHERE (staff_fn LIKE '%$queried%' OR staff_mn LIKE '%$queried%' OR staff_ln LIKE '%$queried%' OR staff_email LIKE '%$queried%' OR staff_contno LIKE '%$queried%' OR staff_add LIKE '%$queried%' OR staff_pos LIKE '%$queried%') AND staff_status=1";
                        foreach ($keys as $k) {
                            $sql .= " OR staff_fn LIKE '%$k%' OR staff_mn LIKE '%$k%' OR staff_ln LIKE '%$k%' OR staff_email LIKE '%$k%' OR staff_contno LIKE '%$k%' OR staff_add LIKE '%$k%' OR staff_pos LIKE '%$k%'";
                        }
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
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
                                            <button id="update" name="update">Update</button>
                                        </form>
                                    </td>
                                    <td class="btn">
                                        <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                            <button id="delete" name="delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                    <?php }
                        };
                    }
                } else { ?>
                    <?php
                    $sql = "SELECT * FROM staff WHERE staff_status=1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
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
                                        <button id="update" name="update">Update</button>
                                    </form>
                                </td>
                                <td class="btn">
                                    <form action="../util/admin_staff.php?staff_id=<?php echo $row['staff_id']; ?>" method="post">
                                        <button id="delete" name="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                <?php };
                    }
                }
                ?>







            </table>
        </div>
    </main>
    </div>
</body>

</html>