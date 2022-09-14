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
        <div class="tbl-cont">
            <table>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <?php

                $sql = "SELECT * FROM client";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
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
                            <td><?php echo $row['clnt_fn']; ?></td>
                            <td><?php echo $row['clnt_ln']; ?></td>
                            <td><?php echo $row['clnt_email']; ?></td>
                            <td class="btn">
                                <form action="admin-clients-view.php?clnt_id=<?php echo $row['clnt_id']; ?>" method="post">
                                    <button name="view" id="view">View</button>
                                </form>
                            </td>
                        </tr>
                <?php };
                } ?>
            </table>
        </div>
    </main>
    </div>
</body>

</html>